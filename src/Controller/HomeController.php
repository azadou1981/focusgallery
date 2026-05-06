<?php

namespace App\Controller;

use App\Repository\PhotoRepository;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home', methods: ['GET'])]
    public function index(
        PhotoRepository $photoRepository,
        CategoryRepository $categoryRepository
    ): Response {
        return $this->render('home/index.html.twig', [
            'photos' => $photoRepository->findAll(),
            'categories' => $categoryRepository->findAll(),
        ]);
    }

    #[Route('/photo/{id}', name: 'app_photo_show', methods: ['GET'])]
    public function show(\App\Entity\Photo $photo): Response
    {
        return $this->render('home/show.html.twig', [
            'photo' => $photo,
        ]);
    }
}