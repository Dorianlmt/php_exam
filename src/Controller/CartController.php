<?php

namespace App\Controller;

use App\Entity\Cart;
use App\Entity\Article;
use App\Entity\Stock;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class CartController extends AbstractController
{
    #[Route('/cart', name: 'app_cart')]
    public function index(EntityManagerInterface $entityManager): Response
    {
        // Récupérer les articles du panier pour l'utilisateur actuel
        $cartItems = $entityManager->getRepository(Cart::class)->findBy([
            'id_user' => $this->getUser()
        ]);

        return $this->render('cart/index.html.twig', [
            'cartItems' => $cartItems,
        ]);
    }

    #[Route('/cart/add/{id}', name: 'app_cart_add')]
    public function addToCart(int $id, EntityManagerInterface $entityManager, Request $request): Response
    {

        // Vérifier si l'utilisateur est connecté
        $user = $this->getUser();
        if (!$user) {
            $this->addFlash('error', 'Veuillez vous connecter pour ajouter un article au panier.');
            return $this->redirectToRoute('app_login');
        }

        // Vérifier si l'article existe
        $article = $entityManager->getRepository(Article::class)->find($id);
        if (!$article) {
            $this->addFlash('error', 'Article non trouvé.');
            return $this->redirectToRoute('app_home');
        }

        // Vérifier le stock de l'article
        $stock = $entityManager->getRepository(Stock::class)->findOneBy([
            'id_article' => $article
        ]);

        if (!$stock || $stock->getQuantity() <= 0) {
            $this->addFlash('error', 'Cet article est en rupture de stock.');
            return $this->redirectToRoute('app_home');
        }


        // Vérifier si l'article est déjà dans le panier
        $cartItem = $entityManager->getRepository(Cart::class)->findOneBy([
            'id_user' => $user,
            'id_article' => $article
        ]);

        if ($cartItem) {
            $cartItem->setQuantity($cartItem->getQuantity() + 1);
        } else {
            // Ajouter un nouvel article au panier
            $cartItem = new Cart();
        $cartItem->setIdUser($user);
        $cartItem->setIdArticle($article);
        $cartItem->setQuantity(1);
        $entityManager->persist($cartItem);

            // Réduire le stock
            $stock->setQuantity($stock->getQuantity() - 1);
            $entityManager->persist($stock);

            $entityManager->flush();

            $this->addFlash('success', 'Article ajouté au panier avec succès !');
        }

        return $this->redirectToRoute('app_cart');
    }

    #[Route('/cart/remove/{id}', name: 'app_cart_remove')]
public function removeFromCart(int $id, EntityManagerInterface $entityManager): Response
{
    $user = $this->getUser();
    if (!$user) {
        $this->addFlash('error', 'Veuillez vous connecter pour modifier votre panier.');
        return $this->redirectToRoute('app_login');
    }

    $article = $entityManager->getRepository(Article::class)->find($id);
    if (!$article) {
        $this->addFlash('error', 'Article non trouvé.');
        return $this->redirectToRoute('app_cart');
    }

    $cartItem = $entityManager->getRepository(Cart::class)->findOneBy([
        'id_user' => $user,
        'id_article' => $article
    ]);

    if (!$cartItem) {
        $this->addFlash('error', 'Cet article n’est pas dans votre panier.');
        return $this->redirectToRoute('app_cart');
    }

    $stock = $entityManager->getRepository(Stock::class)->findOneBy([
        'id_article' => $article
    ]);

    if ($cartItem->getQuantity() > 1) {
        // Réduire la quantité dans le panier
        $cartItem->setQuantity($cartItem->getQuantity() - 1);
    } else {
        // Supprimer l'article du panier si la quantité est 1
        $entityManager->remove($cartItem);
    }

    // Augmenter le stock disponible
    if ($stock) {
        $stock->setQuantity($stock->getQuantity() + 1);
        $entityManager->persist($stock);
    }

    $entityManager->flush();

    $this->addFlash('success', 'Article retiré du panier.');

    return $this->redirectToRoute('app_cart');
}

}
