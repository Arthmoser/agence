<?php

namespace App\Controller;

use App\Repository\LogementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    #[Route('/home', name: 'main_home')]
    public function home(LogementRepository $logementRepository): Response
    {
        $logements = $logementRepository->findLogements();

        return $this->render('main/index.html.twig', [
            'logements' => $logements
        ]);
    }

    #[Route('/cgu', name: 'main_cgu')]
    public function cgu(): Response
    {
        return $this->render('main/cgu.html.twig');
    }

}
