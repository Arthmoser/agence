<?php

namespace App\Controller;

use App\Repository\AgentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/agent', name: 'team_')]
class AgentController extends AbstractController
{
    #[Route('/liste', name: 'list')]
    public function equipe(AgentRepository $agentRepository): Response
    {

        $agents = $agentRepository->findAll([], ['lastName' => 'ASC']);

        dump($agents);

        return $this->render('agent/agentList.html.twig', [
            'agents' => $agents
        ]);
    }


    #[Route('/{id}', name: 'show', requirements: ['id' => '\d+'])]
    public function show(int $id, AgentRepository $agentRepository): Response
    {
        //récupération d'une série par son id
        $agent = $agentRepository->find($id);

        if (!$agent) {
            //lance une erreur 404 si la l'agent n'existe pas
            throw $this->createNotFoundException("Oops ! BG not found !");
        }

        return $this->render('agent/agentDetail.html.twig', [
            'agent' => $agent
        ]);
    }

}
