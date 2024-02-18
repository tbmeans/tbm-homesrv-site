<?php
// src/Controller/SleepController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\DBAL\Connection;

class SleepController extends AbstractController
{
	#[Route('/sleep')]
	public function sleep(Connection $connection): Response
	{
		$metatitle = 'MP4 collection filter: calming';
		$pagetitle = 'SLEEP button favorites';
		$stmt = $connection->prepare("SELECT whenrec, title, cc " .
				"FROM tvrecs WHERE tags LIKE '%calming%'");
		$res = $stmt->executeQuery();
		$videos = $res->fetchAllAssociative();
		
		return $this->render('vids.html.twig', [
			'metatitle' => $metatitle,
			'pagetitle' => $pagetitle,
			'videos' => $videos,
		]);
	}
}
