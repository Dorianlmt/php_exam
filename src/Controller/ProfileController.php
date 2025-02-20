<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

//#[IsGranted("ROLE_USER")] // Protection : seul un utilisateur connecté peut voir son profil
final class ProfileController extends AbstractController
{
    #[Route('/profile', name: 'app_profile')]
    public function index(): Response
    {
        /*$user = $this->getUser(); // Récupérer l'utilisateur connecté

        if (!$user) {
            return $this->redirectToRoute('app_login'); // Rediriger vers la connexion si non connecté
        }*/

        return $this->render('profile/index.html.twig', [
            //'user' => $user,
        ]);
    }
}
