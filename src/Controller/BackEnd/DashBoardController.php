<?php

namespace App\Controller\BackEnd;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DashBoardController extends AbstractController
{
    /**
     * @Route("/dashboard", name="backend.dashboard.index")
     */
    public function index()
    {
        return $this->render('backend/dashboard/index.html.twig', [
            'controller_name' => 'DashBoardController',
        ]);
    }
}
