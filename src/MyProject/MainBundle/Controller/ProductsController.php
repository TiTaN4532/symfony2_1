<?php

namespace MyProject\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class ProductsController extends Controller
{
    
    public function indexAction($slug)
    {   
        $product = $this->getDoctrine()->getRepository('MyProjectMainBundle:Category')->findBySlug($slug);
        
        return $this->render('MyProjectMainBundle:Products:index.html.twig',array('product' => $product));
    }
}
