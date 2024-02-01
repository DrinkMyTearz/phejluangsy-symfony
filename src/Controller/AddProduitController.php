<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Produit;
use Symfony\Component\Security\Core\User\UserInterface;
use App\Form\ProduitType;
use App\Controller\SecurityController;

class AddProduitController extends AbstractController
{

    #[Route('/add_produit', name: 'app_add_produit')]
    public function addProduit(Request $request, EntityManagerInterface $entityManager): Response
    {
        // dd($this->getUser()->getId());
        $userProd = $entityManager->getRepository(Produit::class)->findBy(["id_user"=>$this->getUser()->getId()]);
        $produit = new Produit();
        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $produit->setIdUser($this->getUser());
            $entityManager->persist($produit);
            $entityManager->flush();

            return $this->redirectToRoute('app_add_produit');
        }

        return $this->render('add_produit/index.html.twig', [
            'form' => $form,
            'userProd'=> $userProd,
        ]);
        
    }
}
