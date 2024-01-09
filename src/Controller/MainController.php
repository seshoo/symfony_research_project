<?php

namespace App\Controller;

use App\PageType\Attribute\PageType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_homepage')]
    #[PageType('homepage')]
    public function index(): Response
    {
        return $this->render('main\index.html.twig');
    }
}