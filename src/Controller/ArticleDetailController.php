<?php

namespace App\Controller;

use App\Entity\Article;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleDetailController extends AbstractController
{
    #[Route('/article/{id}', name: 'app_article_detail', requirements: ['id' => '\d+'])]
    public function detail(int $id, EntityManagerInterface $entityManager): Response
    {
        // Récupérer l'article depuis la base de données
        $article = $entityManager->getRepository(Article::class)->find($id);

        // Vérifier si l'article existe
        if (!$article) {
            throw $this->createNotFoundException('Article non trouvé');
        }

        return $this->render('article_detail/index.html.twig', [
            'article' => $article,
        ]);
    }
}
