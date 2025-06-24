<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

final class AccueilController extends AbstractController
{
    #[IsGranted('ROLE_USER')]
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        return $this->render('accueil/home.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }
}
