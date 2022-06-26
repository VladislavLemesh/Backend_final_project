<?php

namespace App\Controller;
use App\Entity\Category;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class CategoryController extends AbstractController
{
    #[Route('/add_category', name: 'add_category')]
    public function addCategory(): Response
    {
        return $this->render('category/index.html.twig', [
        ]);
    }

  #[Route('/show_categories', name: 'show_categories')]
  public function showCategories(ManagerRegistry $doctrine): Response
  {
    $categories = $doctrine->getRepository(Category::class)->findAll();
    return $this->render('category/show_categories.html.twig', [
      'categories' => $categories
    ]);
  }
}
