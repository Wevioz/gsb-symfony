<?php

namespace App\Controller;

use App\Entity\RapportVisite;
use App\Form\RapportVisiteType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * @Route("/rapport/visite")
 */
class RapportVisiteController extends AbstractController
{
    /**
     * @Route("/", name="rapport_visite_index", methods={"GET"})
     */
    public function index(): Response
    {
        $session = new Session();
        $session->start();
        if($session->get('id') == null) return $this->redirectToRoute('auth');

        $rapportVisites = $this->getDoctrine()
            ->getRepository(RapportVisite::class)
            ->findAll();

        return $this->render('rapport_visite/index.html.twig', [
            'rapport_visites' => $rapportVisites,
        ]);
    }

    /**
     * @Route("/new", name="rapport_visite_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $session = new Session();
        $session->start();
        if($session->get('id') == null) return $this->redirectToRoute('auth');

        $rapportVisite = new RapportVisite();
        $form = $this->createForm(RapportVisiteType::class, $rapportVisite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($rapportVisite);
            $entityManager->flush();

            return $this->redirectToRoute('rapport_visite_index');
        }

        return $this->render('rapport_visite/new.html.twig', [
            'rapport_visite' => $rapportVisite,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{rapNum}", name="rapport_visite_show", methods={"GET"})
     */
    public function show(RapportVisite $rapportVisite): Response
    {
        $session = new Session();
        $session->start();
        if($session->get('id') == null) return $this->redirectToRoute('auth');

        return $this->render('rapport_visite/show.html.twig', [
            'rapport_visite' => $rapportVisite,
        ]);
    }

    /**
     * @Route("/{rapNum}/edit", name="rapport_visite_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, RapportVisite $rapportVisite): Response
    {
        $session = new Session();
        $session->start();
        if($session->get('id') == null) return $this->redirectToRoute('auth');

        $form = $this->createForm(RapportVisiteType::class, $rapportVisite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('rapport_visite_index');
        }

        return $this->render('rapport_visite/edit.html.twig', [
            'rapport_visite' => $rapportVisite,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{rapNum}", name="rapport_visite_delete", methods={"DELETE"})
     */
    public function delete(Request $request, RapportVisite $rapportVisite): Response
    {
        $session = new Session();
        $session->start();
        if($session->get('id') == null) return $this->redirectToRoute('auth');

        if ($this->isCsrfTokenValid('delete'.$rapportVisite->getRapNum(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($rapportVisite);
            $entityManager->flush();
        }

        return $this->redirectToRoute('rapport_visite_index');
    }
}
