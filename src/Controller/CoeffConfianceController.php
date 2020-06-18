<?php

namespace App\Controller;

use App\Entity\CoeffConfiance;
use App\Form\CoeffConfianceType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * @Route("/coeff/confiance")
 */
class CoeffConfianceController extends AbstractController
{
    /**
     * @Route("/", name="coeff_confiance_index", methods={"GET"})
     */
    public function index(): Response
    {
        $session = new Session();
        $session->start();
        if($session->get('id') == null) return $this->redirectToRoute('auth');

        $coeffConfiances = $this->getDoctrine()
            ->getRepository(CoeffConfiance::class)
            ->findAll();

        return $this->render('coeff_confiance/index.html.twig', [
            'coeff_confiances' => $coeffConfiances,
        ]);
    }

    /**
     * @Route("/new", name="coeff_confiance_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $session = new Session();
        $session->start();
        if($session->get('id') == null) return $this->redirectToRoute('auth');

        $coeffConfiance = new CoeffConfiance();
        $form = $this->createForm(CoeffConfianceType::class, $coeffConfiance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($coeffConfiance);
            $entityManager->flush();

            return $this->redirectToRoute('coeff_confiance_index');
        }

        return $this->render('coeff_confiance/new.html.twig', [
            'coeff_confiance' => $coeffConfiance,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{coefconfNum}", name="coeff_confiance_show", methods={"GET"})
     */
    public function show(CoeffConfiance $coeffConfiance): Response
    {
        $session = new Session();
        $session->start();
        if($session->get('id') == null) return $this->redirectToRoute('auth');

        return $this->render('coeff_confiance/show.html.twig', [
            'coeff_confiance' => $coeffConfiance,
        ]);
    }

    /**
     * @Route("/{coefconfNum}/edit", name="coeff_confiance_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CoeffConfiance $coeffConfiance): Response
    {
        $session = new Session();
        $session->start();
        if($session->get('id') == null) return $this->redirectToRoute('auth');

        $form = $this->createForm(CoeffConfianceType::class, $coeffConfiance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('coeff_confiance_index');
        }

        return $this->render('coeff_confiance/edit.html.twig', [
            'coeff_confiance' => $coeffConfiance,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{coefconfNum}", name="coeff_confiance_delete", methods={"DELETE"})
     */
    public function delete(Request $request, CoeffConfiance $coeffConfiance): Response
    {
        $session = new Session();
        $session->start();
        if($session->get('id') == null) return $this->redirectToRoute('auth');

        if ($this->isCsrfTokenValid('delete'.$coeffConfiance->getCoefconfNum(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($coeffConfiance);
            $entityManager->flush();
        }

        return $this->redirectToRoute('coeff_confiance_index');
    }
}
