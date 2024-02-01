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


class PinsController extends AbstractController
{
    #[Route('/', name: 'app_pins')]
    public function showPins(Request $request, EntityManagerInterface $entityManager): Response
    {
        return $this->redirectToRoute('app_pin_trans', ["_locale"=>"en"]);
    }

    #[Route('{_locale}/', name: 'app_pin_trans')]
    public function commeTuVeux(Request $request, EntityManagerInterface $entityManager): Response{
        $pins = $entityManager->getRepository(Produit::class)->findAll();

        return $this->render('pins/index.html.twig', [
            'pins' => $pins,
        ]);
    }
    
}
