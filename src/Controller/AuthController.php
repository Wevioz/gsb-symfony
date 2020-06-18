<?php 
namespace App\Controller;
use App\Entity\Visiteur;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Forms;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


/**
 * @Route("/")
 */

class AuthController extends AbstractController {

    public function index(Request $request): Response
    {
        $authForm = $this->createFormBuilder()
            ->add('visLogin', TextType::class)
            ->add('visMdp', TextType::class)
            ->add('save', SubmitType::class)
            ->getForm();

        $authForm->handleRequest($request);

        dump($request);

        return $this->render('auth/index.html.twig', ['authForm' => $authForm->createView()]);
    }
}