<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\GaesteBuchType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

final class MainController extends AbstractController
{

    public function __construct(private readonly EntityManagerInterface $em)
    {


    }

    #[Route('/', name: 'index')]
    public function index(Request $request): Response
    {

        $form = $this->createForm(GaesteBuchType::class);

        $form->handleRequest($request);

        if($form->isSubmitted()){

            $data = $form->getData();
            $this->em->persist($data);
            $this->em->flush();
            return $this->redirectToRoute('index');


        }

        return $this->render('main/index.html.twig', [
            'formular' => $form,
        ]);
    }
}
