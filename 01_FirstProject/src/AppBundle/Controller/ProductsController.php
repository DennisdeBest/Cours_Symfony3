<?php
namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;


/**
 * @Route("/products")
 */
class ProductsController extends Controller {
    /**
     * @Route("/")
     */
    public function listAction(){
        $em = $this->getDoctrine()->getManager();
        $products = $em->getRepository('AppBundle:Product')->findAll();

        return $this->render('AppBundle::products/list.html.twig', ['products' => $products]);
    }

    /**
     * @Route("/{id}", requirements={"id"="\d+"})
     */
    public function showAction($id){
        $em = $this->getDoctrine()->getManager();
        $products = $em->getRepository('AppBundle:Product')->findOnebyId($id);

        return $this->render('AppBundle::products/show.html.twig', ['products' => $products]);
    }
}