<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\GaesteBuchType;
use App\Repository\GaesteBuchEntityRepository;
use Symfony\Component\HttpFoundation\Request;

final class MainController extends AbstractController
{

    public function __construct(private readonly int $limit, private readonly GaesteBuchEntityRepository $repository)
    {


    }

    #[Route('/', name: 'index')]
    public function index(Request $request): Response
    {

        $form = $this->createForm(GaesteBuchType::class);

        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()){

            $data = $form->getData();
            $this->repository->add($data);
            $this->repository->flush();
            $this->addFlash('success','Daten erfolgreich gespeichert!');
            return $this->redirectToRoute('index');
        }      
        
        
        $maxPages = $this->getMaxPages($this->limit);
        $currentPage = $this->getCurrentPages($request, $maxPages);

        $entries = $this->repository->getPaginatedEntries($this->limit, $currentPage);
        
        return $this->render('main/index.html.twig', [
            'gaesteBuchForm' => $form,
            'entries' => $entries,
            'maxPages' => $maxPages,
            'currentPage' => $currentPage,
        ]);
    }


    private function getMaxPages(int $limit): int{

        $totalEntries = $this->repository->count([]);

        return (int) ceil($totalEntries/$limit);

    }

    private function getCurrentPages(Request $request, int $maxPages): int{
        $page = (int) $request->get('page',1);
        return min(max($page,1),$maxPages);
    }

}
