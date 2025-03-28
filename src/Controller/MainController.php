<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\GaesteBuchType;
use Symfony\Component\HttpFoundation\Request;

final class MainController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(Request $request): Response
    {

        $form = $this->createForm(GaesteBuchType::class);

        $form->handleRequest($request);

        if($form->isSubmitted()){

            $data = $form->getData();
            dump($data);

        }

        return $this->render('main/index.html.twig', [
            'formular' => $form,
        ]);
    }
}
