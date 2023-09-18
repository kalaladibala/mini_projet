<?php

namespace App\Controller;

use App\Entity\Emprunts;
use App\Entity\Objets;
use App\Form\EmpruntFormType;
use App\Repository\EmpruntsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class EmpruntController extends AbstractController
{
    #[Route('/emprunt', name: 'app_emprunt')]
    public function index(EmpruntsRepository $empruntsRepository): Response
    {
        return $this->render('emprunt/index.html.twig', [
            'emprunts' => $empruntsRepository->findAll(),
        ]);
    }

    #[Route('/new_emprunt/{id}', name: 'app_emprunt_new', methods: ['GET', 'POST'])]
    public function create(Objets $objets,Request $request,EmpruntsRepository $empruntsRepository, EntityManagerInterface $entityManager ): Response
    {
        $emprunt = new Emprunts();
        $form = $this->createForm(EmpruntFormType::class, $emprunt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $emprunt->setObjet($objets);
            $entityManager->persist($emprunt);
            $entityManager->flush();

            return $this->redirectToRoute('app_emprunt', [], Response::HTTP_SEE_OTHER);
        }
        
        return $this->render('emprunt/new.html.twig', [
            'form' => $form->createView(),
            'objet' => $objets
        ]);
    }
}
