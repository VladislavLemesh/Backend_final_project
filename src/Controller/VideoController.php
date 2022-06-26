<?php

namespace App\Controller;

use App\Entity\Video;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;

class VideoController extends AbstractController
{
    #[Route('/show_videos', name: 'show_videos')]
    public function showVideos(ManagerRegistry $doctrine): Response
    {
        //$videos = $doctrine->getRepository(Video::class)->findAll();
        $videos = $doctrine->getRepository(Video::class)->findAllWithCategories();
        return $this->render('video/show_videos.html.twig', [
          'videos' => $videos
        ]);
    }

    #[Route('/add_video', name: 'add_video')]
    public function addVideo(): Response
    {
      return $this->render('video/add_video.html.twig', [
      ]);
    }

  #[Route('/show_video_by_cat/{category_id}', name: 'show_video_by_cat')]
  public function showByCategory(ManagerRegistry $doctrine, int $category_id): Response
  {
    $videos = $doctrine->getRepository(Video::class)->findByCategory($category_id);
    return $this->render('video/show_videos.html.twig', [
      'videos' => $videos
    ]);
  }
}
