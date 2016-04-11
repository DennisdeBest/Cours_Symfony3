<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $products = $em->getRepository('AppBundle:Product')->findBy([],[],10);

        return $this->render('AppBundle::default/index.html.twig', ['products' => $products]);
    }

    /**
     * @Route("/hello/{name}", name="test-route")
     */
    public function helloAction($name)
    {
        return new Response("Hello ".$name);
        //return $this->redirectToRoute('homepage');
        //return $this ->redirect('http://google.com');
    }
}
