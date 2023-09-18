<?php

namespace App\Controller;

use App\Entity\Objets;
use App\Form\ObjetsType;
use App\Repository\ObjetsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/objets')]
class ObjetsController extends AbstractController
{
    #[Route('/', name: 'app_objets_index', methods: ['GET'])]
    public function index(ObjetsRepository $objetsRepository): Response
    {
        return $this->render('objets/index.html.twig', [
            'objets' => $objetsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_objets_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $objet = new Objets();
        $form = $this->createForm(ObjetsType::class, $objet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($objet);
            $entityManager->flush();

            return $this->redirectToRoute('app_objets_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('objets/new.html.twig', [
            'objet' => $objet,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_objets_show', methods: ['GET'])]
    public function show(Objets $objet): Response
    {
        return $this->render('objets/show.html.twig', [
            'objet' => $objet,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_objets_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Objets $objet, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ObjetsType::class, $objet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_objets_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('objets/edit.html.twig', [
            'objet' => $objet,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_objets_delete', methods: ['POST'])]
    public function delete(Request $request, Objets $objet, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$objet->getId(), $request->request->get('_token'))) {
            $entityManager->remove($objet);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_objets_index', [], Response::HTTP_SEE_OTHER);
    }
}
