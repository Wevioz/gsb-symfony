<?php

namespace App\Controller;

use App\Entity\Praticien;
use App\Form\PraticienType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * @Route("/praticien")
 */
class PraticienController extends AbstractController
{
    /**
     * @Route("/", name="praticien_index", methods={"GET"})
     */
    public function index(): Response
    {
        $session = new Session();
        $session->start();
        if($session->get('id') == null) return $this->redirectToRoute('auth');

        $praticiens = $this->getDoctrine()
            ->getRepository(Praticien::class)
            ->findAll();

        return $this->render('praticien/index.html.twig', [
            'praticiens' => $praticiens,
        ]);
    }

    /**
     * @Route("/new", name="praticien_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $session = new Session();
        $session->start();
        if($session->get('id') == null) return $this->redirectToRoute('auth');

        $praticien = new Praticien();
        $form = $this->createForm(PraticienType::class, $praticien);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($praticien);
            $entityManager->flush();

            return $this->redirectToRoute('praticien_index');
        }

        return $this->render('praticien/new.html.twig', [
            'praticien' => $praticien,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{praNum}", name="praticien_show", methods={"GET"})
     */
    public function show(Praticien $praticien): Response
    {
        $session = new Session();
        $session->start();
        if($session->get('id') == null) return $this->redirectToRoute('auth');

        return $this->render('praticien/show.html.twig', [
            'praticien' => $praticien,
        ]);
    }

    /**
     * @Route("/{praNum}/edit", name="praticien_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Praticien $praticien): Response
    {
        $session = new Session();
        $session->start();
        if($session->get('id') == null) return $this->redirectToRoute('auth');

        $form = $this->createForm(PraticienType::class, $praticien);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('praticien_index');
        }

        return $this->render('praticien/edit.html.twig', [
            'praticien' => $praticien,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{praNum}", name="praticien_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Praticien $praticien): Response
    {
        $session = new Session();
        $session->start();
        if($session->get('id') == null) return $this->redirectToRoute('auth');
        
        if ($this->isCsrfTokenValid('delete'.$praticien->getPraNum(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($praticien);
            $entityManager->flush();
        }

        return $this->redirectToRoute('praticien_index');
    }
}
