<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AttendanceSheetController extends AbstractController
{
    #[Route('/feuille-de-presence', name: 'app_feuillepresence')]
    public function index(): Response
    {
        return $this->render('attendance_sheet/index.html.twig', [
            'controller_name' => 'AttendanceSheetController',
        ]);
    }
}
