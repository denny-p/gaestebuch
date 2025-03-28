<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Form\GaesteBuchType;

final class MainController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function index(): Response
    {

        $form = $this->createForm(GaesteBuchType::class);

        return $this->render('main/index.html.twig', [
            'formular' => $form,
        ]);
    }
}
