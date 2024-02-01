<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\User;
use Symfony\Component\Security\Core\User\UserInterface;
use App\Form\UserType;
use App\Controller\SecurityController;
class AdminPanelControlController extends AbstractController
{
    #[Route('{_locale}/admin_panel_control', name: 'app_admin_panel_control')]
    public function showUser(Request $request, EntityManagerInterface $entityManager): Response
    {
        $users = $entityManager->getRepository(User::class)->findAll();

        return $this->render('admin_panel_control/index.html.twig', [
            'users' => $users,
        ]);
    }

    #[Route('{_locale}/delete/{id}', name: 'app_delete')]
    public function deleteUser(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $entityManager->getRepository(User::class)->find($request->get('id'));
        $entityManager->remove($user);
        $entityManager->flush();
        return $this->redirectToRoute('app_admin_panel_control');
    }
}
