<?php
// src/Controller/Mp4Controller.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\DBAL\Connection;

class Mp4Controller extends AbstractController
{
	#[Route('/allrecs')]
	public function allrecs(Connection $connection): Response
	{
		$metatitle = 'MP4 collection';
		$pagetitle = 'our TV recordings';
		$videos = $connection->fetchAllAssociative(
				'SELECT whenrec,title,cc FROM tvrecs');
		
		return $this->render('vids.html.twig', [
			'metatitle' => $metatitle,
			'pagetitle' => $pagetitle,
			'videos' => $videos,
		]);
	}
}
