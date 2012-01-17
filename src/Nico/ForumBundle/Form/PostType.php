<?php

namespace Nico\ForumBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class PostType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('body');
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Nico\ForumBundle\Entity\Post',
        );
    }

    public function getName()
    {
        return 'post';
    }
}