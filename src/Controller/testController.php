<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class testController extends AbstractController
{
    #[Route('/test')]
    public function number(): Response
    {

        return $this->render('base.html.twig', [
        ]);
    }
}
?>