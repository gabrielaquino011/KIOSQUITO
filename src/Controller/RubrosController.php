<?php

namespace App\Controller;

use App\Entity\Rubros;
use App\Form\RubrosType;
use App\Repository\RubrosRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/rubros')]
class RubrosController extends AbstractController
{
    #[Route('/', name: 'rubros_index', methods: ['GET'])]
    public function index(RubrosRepository $rubrosRepository): Response
    {
        return $this->render('rubros/index.html.twig', [
            'rubros' => $rubrosRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'rubros_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $rubro = new Rubros();
        $form = $this->createForm(RubrosType::class, $rubro);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($rubro);
            $entityManager->flush();

            return $this->redirectToRoute('rubros_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('rubros/new.html.twig', [
            'rubro' => $rubro,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'rubros_show', methods: ['GET'])]
    public function show(Rubros $rubro): Response
    {
        return $this->render('rubros/show.html.twig', [
            'rubro' => $rubro,
        ]);
    }

    #[Route('/{id}/edit', name: 'rubros_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Rubros $rubro, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(RubrosType::class, $rubro);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('rubros_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('rubros/edit.html.twig', [
            'rubro' => $rubro,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'rubros_delete', methods: ['POST'])]
    public function delete(Request $request, Rubros $rubro, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$rubro->getId(), $request->request->get('_token'))) {
            $entityManager->remove($rubro);
            $entityManager->flush();
        }

        return $this->redirectToRoute('rubros_index', [], Response::HTTP_SEE_OTHER);
    }
}
