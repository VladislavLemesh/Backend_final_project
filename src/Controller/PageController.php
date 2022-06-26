<?php

namespace App\Controller;

use App\Entity\Page;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Routing\Annotation\Route;


class PageController extends AbstractController
{
    #[Route('/', name: 'home_page')]
    public function index(ManagerRegistry $doctrine): Response
    {
        /*$entityManager = $doctrine->getManager();
        $page = new Page();
        $page->setKeywords('видео');
        $page->setTitle('видео');
        $page->setContent('Какое-то наполнение контента');
        $page->setDescription('наполнение описания');

        $entityManager->persist($page);
        $entityManager->flush();*/
        $homePage = $doctrine->getRepository(Page::class)->find(1);
        return $this->render('page/index.html.twig', ['homePage' => $homePage]);
    }
}
