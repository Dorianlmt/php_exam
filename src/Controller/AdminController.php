<?php 
namespace App\Controller;

use App\Entity\Article;
//use App\Entity\Stock;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

#[IsGranted("ROLE_ADMIN")]
final class AdminController extends AbstractController
{
    
    #[Route('/admin', name: 'app_admin')]
        public function dashboard(): Response
        {
            $user = $this->getUser();
            if (!$this->isGranted('ROLE_ADMIN')) {
                return $this->redirectToRoute('app_login'); 
            }

        return $this->render('admin/index.html.twig', [
            'user' => $user,
        ]);
    }

    #[Route('/admin/add-article', name: 'app_add_article', methods: ['POST'])]
    public function addArticle(Request $request, EntityManagerInterface $entityManager): Response
    {    
        $name = $request->request->get('nom'); 
        $description = $request->request->get('content');
        $price = (float) $request->request->get('price'); 
        $image = $request->request->get('image');
        $dateString = $request->request->get('date_publication');
        $datePublication = \DateTime::createFromFormat('Y-m-d', $dateString);
        //$quantity = (int) $request->request->get('quantity');

        if ($datePublication) {
            $datePublication->setTime(0, 0, 0);
        } else {
            return new Response('Date invalide', 400);
        }


        $user = $this->getUser();

        if (!$user) {
            $this->addFlash('error', 'Vous devez être connecté pour ajouter un article.');
            return $this->redirectToRoute('app_login');
        }

        $article = new Article();
        $article->setName($name);
        $article->setDescription($description);
        $article->setPrice($price);
        $article->setImage($image);
        $article->setDatePublication($datePublication);
        $article->setIdAuthor($user);
        $entityManager->persist($article);

        $entityManager->flush();
        $this->addFlash('success', 'Article ajouté avec succès !');
        return $this->redirectToRoute('app_home');
    }

    #[Route('/admin/delete-article/{id}', name: 'app_article_delete', methods: ['POST'])]
        public function deleteArticle(int $id, EntityManagerInterface $entityManager): Response
    {
            $article = $entityManager->getRepository(Article::class)->find($id);

            if (!$article) {
                $this->addFlash('error', 'Article non trouvé.');
                return $this->redirectToRoute('app_admin');
            }

            $entityManager->remove($article); // Supprimer l'article
            $entityManager->flush();

            $this->addFlash('success', 'Article supprimé avec succès !');
            return $this->redirectToRoute('app_home');
    }
}