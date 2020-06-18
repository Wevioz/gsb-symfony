<?php 
namespace App\Controller;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Session\Session;

/**
 * @Route("/")
 */

class HomeController extends AbstractController {

    public function index(): Response
    {
        $session = new Session();
        $session->start();
        
        if($session->get('id') == null) return $this->redirectToRoute('auth');
        
        return $this->render('home/index.html.twig');
    }
}