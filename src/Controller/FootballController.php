<?php
// src/Controller/FootballController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class FootballController extends AbstractController
{
	const SPECTRUM = 'https://watch.spectrum.net/livetv';
	const PEACOCK = 'https://www.peacocktv.com/sports/nfl';
	
    #[Route('/nfl')]
    public function nfl(): Response
    {
        $metatitle = 'Seasonal page';
        $pagetitle = 'get ready for playoffs!';
        $cards = [
            new Card(self::SPECTRUM, 'NBC', 'SATURDAY 4:30', 'browns.png',
					'Cleveland Browns @ Houston Texans'),
            new Card(self::PEACOCK, 'PEACOCK', 	'SATURDAY 8:00', 'dolphs.png',
					'Miami Dolphins @ KC Chiefs'),
	    	new Card(self::SPECTRUM, 'CBS', 'SUNDAY 1:00', 'bills.png',
					'Pittsburgh Steelers @ Buffalo Bills'),
            new Card(self::SPECTRUM, 'FOX', 'SUNDAY 4:30', 'boys.png',
					'Green Bay Packers @ Dallas Cowboys'),
			new Card(self::SPECTRUM, 'NBC', 'SUNDAY 8:15', 'lionsh.png',
					'Los Angeles Rams @ Detroit Lions'),
			new Card(self::SPECTRUM, 'ABC', 'MONDAY 8:00', 'eaguls.png',
					'Philadelphia Eagles @ Tampa Bay Buccaneers'),
        ];

        return $this->render('page.html.twig', [
                'metatitle' => $metatitle,
                'pagetitle' => $pagetitle,
                'cards' => $cards,
        ]);
    }
}

