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



class ProductsAdmin extends Admin
{
 
    // setup the default sort column and order
    protected $datagridValues = array(
        '_sort_order' => 'DESC',
        '_sort_by' => 'created_at'
    );
    
    protected function configureShowField(ShowMapper $showMapper)
    {
        $showMapper
                ->add('id', null, array('label' => 'ID'))
                ->add('name', null, array('label' => 'Название'))
                ->add('description', null, array('label' => 'Описание'))
               ;
    }
    protected function configureFormFields(FormMapper $formMapper)
    {
        $productId=$this->getSubject()->getId();
        $query = $this->modelManager->getEntityManager('MyProject\MainBundle\Entity\Images')->createQuery('SELECT i FROM MyProject\MainBundle\Entity\Images i WHERE i.product_id IS NULL OR i.product_id = :id')->setParameter('id',$productId);
            $formMapper
            ->with('Основное')
            ->add('name',null, array('label' => 'Название'))
            ->add('description',null, array('label' => 'Описание'))
            ->add('category',null, array('label' => 'Категория', 'empty_value' => 'не выбрано'))
            ->with('Картинки')
            ->add('images','sonata_type_model',array('by_reference' => false, 'multiple' => true, 'expanded'=>true,'query'=>$query), array(
                 ))
            ->end()
            ;
            
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('category', null, array('label' => 'Категории'))
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name', null, array('label' => 'Название'))
           
                ->add('_action', 'actions', array(
                'actions' => array(
                    'view' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )))
                ->add('created_at', 'date', array('label' => 'Дата создания'))
                ->add('updated_at', 'date', array('label' => 'Дата редактирования'));
        ;
    }
//    public function postUpdate($object){
//
//
//       $k=$this->get('request')->request->get($form->getName(), array());
//        $em = $this->getDoctrine()->getEntityManager();
//        $images=$em->getRepository('MyProjectMainBundle:Images')->findBy(array('product_id' => $id));
//         foreach($images as $key => $value)
//         {
//             if(!in_array($value->getId(),$k['images']))
//             {
//                  $value->setProductId('null');
//             }
//             $em->flush();
//         }
//        
//       
//    }
    
}
