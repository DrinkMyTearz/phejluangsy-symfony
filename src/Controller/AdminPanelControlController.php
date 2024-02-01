<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminPanelControlController extends AbstractController
{
    #[Route('/admin_panel_control', name: 'app_admin_panel_control')]
    public function index(): Response
    {
        return $this->render('admin_panel_control/index.html.twig', [
            'controller_name' => 'AdminPanelControlController',
        ]);
    }
}
