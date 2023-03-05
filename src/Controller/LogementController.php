<?php

namespace App\Controller;

use App\Entity\Logement;
use App\Form\LogementType;
use App\Repository\LogementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/logement', name: 'logement_')]
class LogementController extends AbstractController
{
    #[Route('/detail/{id}', name: 'detail')]
    public function show($id, LogementRepository $logementRepository): Response
    {

        $logement = $logementRepository->find($id);

        return $this->render('logement/detail.html.twig', [
            'logement' => $logement
        ]);
    }


    #[Route('/add', name: 'add')]
    public function add(LogementRepository $logementRepository, Request $request): Response
    {
        $logement = new Logement();

        $logementForm = $this->createForm(LogementType::class, $logement);

        $logementForm->handleRequest($request);

        if ($logementForm->isSubmitted() && $logementForm->isValid()) {


            $logementRepository->save($logement, true);

            $this->addFlash("success", "Annonce publiée !");

            return $this->redirectToRoute('logement_detail', ['id' => $logement->getId()]);

        }

        dump($logement);

        return $this->render('logement/add.html.twig', [
            'logementForm' => $logementForm->createView()
        ]);
    }

}
