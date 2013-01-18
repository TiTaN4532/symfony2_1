<?php

namespace MyProject\MainBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Symfony\Component\HttpFoundation\Request;
use \MyProject\MainBundle\Form\Type\ImageType;

class OrderAdmin extends Admin
{
 
    // setup the default sort column and order
    protected $datagridValues = array(
        '_sort_order' => 'DESC',
        '_sort_by' => 'created_at'
    );
    

    protected function configureFormFields(FormMapper $formMapper)
    {
          $formMapper
            ->with('Контакты')
            ->add('adress',null, array('label' => 'Адрес'))
            ->add('tel',null, array('label' => 'Телефон'))
            ->add('email',null, array('label' => 'Email'))
            ->with('Оплата, доставка')
            ->add('pay',null, array('label' => 'Способ оплаты'))
            ->with('Товары')
//           ->add('articuls','collection', array(
//                'type' => 'text',
//                'allow_add' => true,
//
//            ))
            ->end()
            ;
            
    }


    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name', null, array('label' => 'Название'))
           
                ->add('_action', 'actions', array(
                'actions' => array(
                    'edit' => array(),
                    'delete' => array(),
                )))
                ->add('created_at', 'date', array('label' => 'Дата создания'))
                ->add('updated_at', 'date', array('label' => 'Дата редактирования'));
        ;
    }
    
}
