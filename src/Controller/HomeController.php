<?php
// src/Controller/HomeController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    #[Route('/')]
    public function home(): Response
    {
        $metatitle = 'Media server';
        $pagetitle = 'digital collections';
        $cards = [
            new Card('allrecs', 'All movies', null, null, null),
            new Card('nfl', 'Football on TV', null, null, null),
        ];

        return $this->render('page.html.twig', [
                'metatitle' => $metatitle,
                'pagetitle' => $pagetitle,
                'cards' => $cards,
        ]);
    }
}
