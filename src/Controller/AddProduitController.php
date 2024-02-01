<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddProduitController extends AbstractController
{
    #[Route('/add/produit', name: 'app_add_produit')]
    public function index(): Response
    {
        return $this->render('add_produit/index.html.twig', [
            'controller_name' => 'Add your product',
        ]);
    }

    public function addProduit(Request $request, EntityManagerInterface $entityManager): Response
    {
        $produit = new Produit();
        $form = $this->createForm(NewListType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $todolist->setUser($this->getUser());
            $entityManager->persist($todolist);
            $entityManager->flush();

            return $this->redirectToRoute('app_home');
        }

        return $this->render('new_list/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
