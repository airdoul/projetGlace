<?php

namespace App\Controller;

use App\Entity\Glaces;
use App\Repository\GlacesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

final class ListGlacesController extends AbstractController
{
    #[Route('/list/glaces', name: 'app_list_glaces')]


    public function index(GlacesRepository $repository): Response

    {
        $glaces = $repository->findAll();

        return $this->render('list_glaces/list_glaces.html.twig', [
            'glaces' => $glaces,
        ]);
    }


    #[IsGranted('ROLE_USER')]
    #[Route('/list/glaces/delete/{id}', name: 'delete_glace', methods:['POST'])]
    public function delete(Glaces $glace, Request $request, EntityManagerInterface $entity_manager_interface)
    {
        if($this->isCsrfTokenValid("SUP". $glace->getId(),$request->get('_token'))){
            $entity_manager_interface->remove($glace);
            $entity_manager_interface->flush();

            $this->addFlash("success", "La suppression a bien été effectuée !");
            
        }
       return $this->redirectToRoute("app_list_glaces"); 
    }
}
