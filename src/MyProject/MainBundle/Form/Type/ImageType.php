<?php

namespace MyProject\MainBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ImageType extends AbstractType
{
     public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('file','file');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'MyProject\MainBundle\Entity\Images',
        ));
    }

    public function getName()
    {
        return 'images';
    }
    
}