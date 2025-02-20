<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;
use Symfony\Component\Security\Http\Authenticator\FormLoginAuthenticator;

class SignupController extends AbstractController
{
    #[Route('/signup', name: 'app_signup')]
    public function signup(
        Request $request, 
        EntityManagerInterface $entityManager, 
        UserPasswordHasherInterface $passwordHasher, 
        UserAuthenticatorInterface $userAuthenticator
    ): Response {
        if ($request->isMethod('POST')) {
            $email = $request->request->get('email');
            $username = $request->request->get('username');
            $plainPassword = $request->request->get('password');

            // Vérifier si l'email est déjà utilisé
            $existingUser = $entityManager->getRepository(User::class)->findOneBy(['email' => $email]);
            if ($existingUser) {
                $this->addFlash('error', 'Cet email est déjà utilisé.');
                return $this->redirectToRoute('app_signup');
            }

            // Créer un nouvel utilisateur
            $user = new User();
            $user->setEmail($email);
            $user->setUsername($username);
            $user->setRoles(['ROLE_USER']);
            $user->setSolde(0); // Définir un solde initial (modifiable selon besoin)

            // Hacher le mot de passe avant de l'enregistrer
            $hashedPassword = $passwordHasher->hashPassword($user, $plainPassword);
            $user->setPassword($hashedPassword);

            // Enregistrer l'utilisateur en base de données
            $entityManager->persist($user);
            $entityManager->flush();

            // Ajouter un message flash de succès
            $this->addFlash('success', 'Votre compte a été créé avec succès. Connectez-vous !');

            // Rediriger vers la page de connexion
            return $this->redirectToRoute('app_login');
        }

        return $this->render('signup/index.html.twig');
    }
}
