<?php

namespace MyProject\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class SidebarController extends Controller
{
    
    public function indexAction()
    {   
        $slug = $this->getRequest()->get('slug') ? $this->getRequest()->get('slug') : '';
        
        $categories = $this->getDoctrine()->getRepository('MyProjectMainBundle:Category')->findAll();
        
        return $this->render('MyProjectMainBundle:Sidebar:index.html.twig',array('categories' => $categories, 'slug' => $slug));
    }
}
