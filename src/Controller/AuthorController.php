<?php

namespace App\Controller;

use App\Entity\Author;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AuthorRepository;
use App\Form\AuthorType;

class AuthorController extends AbstractController
{
    #[Route('/author', name: 'app_author')]
    public function showAuthors(AuthorRepository $authorRepository): Response
    {
        return $this->render('author/index.html.twig', [
            'authors' => $authorRepository->findAll(),
        ]);
    }

    #[Route('/add_author', name: 'add_author')]
    public function add(Request $request, AuthorRepository $authorRepository): Response
    {
        $author = new Author();
        $form = $this->createForm(AuthorType::class, $author);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $authorRepository->add($author, true);

            return $this->redirectToRoute('app_author', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('author/add_author.html.twig', [
            'author' => $author,
            'form' => $form,
        ]);
    }
}
