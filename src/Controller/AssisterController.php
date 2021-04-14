<?php

namespace App\Controller;

use App\Entity\Assister;
use App\Form\AssisterType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/assister")
 */
class AssisterController extends AbstractController
{
    /**
     * @Route("/", name="assister_index", methods={"GET"})
     */
    public function index(): Response
    {
        $assisters = $this->getDoctrine()
            ->getRepository(Assister::class)
            ->findAll();

        return $this->render('assister/index.html.twig', [
            'assisters' => $assisters,
        ]);
    }

    /**
     * @Route("/new", name="assister_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $assister = new Assister();
        $form = $this->createForm(AssisterType::class, $assister);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($assister);
            $entityManager->flush();

            return $this->redirectToRoute('assister_index');
        }

        return $this->render('assister/new.html.twig', [
            'assister' => $assister,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="assister_show", methods={"GET"})
     */
    public function show(Assister $assister): Response
    {
        return $this->render('assister/show.html.twig', [
            'assister' => $assister,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="assister_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Assister $assister): Response
    {
        $form = $this->createForm(AssisterType::class, $assister);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('assister_index');
        }

        return $this->render('assister/edit.html.twig', [
            'assister' => $assister,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="assister_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Assister $assister): Response
    {
        if ($this->isCsrfTokenValid('delete'.$assister->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($assister);
            $entityManager->flush();
        }

        return $this->redirectToRoute('assister_index');
    }
}
