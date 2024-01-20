<?php
// src/Controller/VideoController.php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class VideoPlayerController extends AbstractController
{
	#[Route('/{recdat}', name: 'video_show')]
	public function show(string $recdat): Response
	{
		$id = substr($recdat, 0, 10);
		$iscc = substr($recdat, 12, 1);
		
		return $this->render('play.html.twig', [
			'id' => $id,
			'iscc' => $iscc,
		]);
	}
}
