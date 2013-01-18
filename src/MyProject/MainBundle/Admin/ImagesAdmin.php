<?php

namespace MyProject\MainBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Form\FormMapper;


class ImagesAdmin extends Admin
{
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('name','string', array('template' => 'MyProjectMainBundle:Form:fields.html.twig'))
                            ->add('_action', 'actions', array(
                'actions' => array(
                    'delete' => array(),
                    
                )));
        ;
    }
    
    /**
     * @param \Sonata\AdminBundle\Form\FormMapper $formMapper
     * @return void
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
            $formMapper
                ->add('file','file', array());

    }


}