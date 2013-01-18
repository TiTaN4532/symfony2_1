<?php

namespace MyProject\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use MyProject\MainBundle\Entity\Order;

class OrderController extends Controller
{
    
    public function indexAction()
    {  
         // создаём задачу и присваиваем ей некоторые начальные данные для примера
        $task = new Order();
       

        $form = $this->createFormBuilder($task)
            ->add('adress')
            ->add('tel')
            ->add('email')
            ->getForm();

        return $this->render('MyProjectMainBundle:Default:order.html.twig', array(
            'form' => $form->createView(),'slug' => 'qwe'
        ));
    }
}