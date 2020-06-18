<?php

namespace App\Controller;

use App\Entity\TypePraticien;
use App\Form\TypePraticienType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * @Route("/type/praticien")
 */
class TypePraticienController extends AbstractController
{
    /**
     * @Route("/", name="type_praticien_index", methods={"GET"})
     */
    public function index(): Response
    {
        $session = new Session();
        $session->start();
        if($session->get('id') == null) return $this->redirectToRoute('auth');

        $typePraticiens = $this->getDoctrine()
            ->getRepository(TypePraticien::class)
            ->findAll();

        return $this->render('type_praticien/index.html.twig', [
            'type_praticiens' => $typePraticiens,
        ]);
    }

    /**
     * @Route("/new", name="type_praticien_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $session = new Session();
        $session->start();
        if($session->get('id') == null) return $this->redirectToRoute('auth');

        $typePraticien = new TypePraticien();
        $form = $this->createForm(TypePraticienType::class, $typePraticien);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($typePraticien);
            $entityManager->flush();

            return $this->redirectToRoute('type_praticien_index');
        }

        return $this->render('type_praticien/new.html.twig', [
            'type_praticien' => $typePraticien,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{typCode}", name="type_praticien_show", methods={"GET"})
     */
    public function show(TypePraticien $typePraticien): Response
    {
        $session = new Session();
        $session->start();
        if($session->get('id') == null) return $this->redirectToRoute('auth');

        return $this->render('type_praticien/show.html.twig', [
            'type_praticien' => $typePraticien,
        ]);
    }

    /**
     * @Route("/{typCode}/edit", name="type_praticien_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, TypePraticien $typePraticien): Response
    {
        $session = new Session();
        $session->start();
        if($session->get('id') == null) return $this->redirectToRoute('auth');

        $form = $this->createForm(TypePraticienType::class, $typePraticien);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('type_praticien_index');
        }

        return $this->render('type_praticien/edit.html.twig', [
            'type_praticien' => $typePraticien,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{typCode}", name="type_praticien_delete", methods={"DELETE"})
     */
    public function delete(Request $request, TypePraticien $typePraticien): Response
    {
        $session = new Session();
        $session->start();
        if($session->get('id') == null) return $this->redirectToRoute('auth');

        if ($this->isCsrfTokenValid('delete'.$typePraticien->getTypCode(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($typePraticien);
            $entityManager->flush();
        }

        return $this->redirectToRoute('type_praticien_index');
    }
}
