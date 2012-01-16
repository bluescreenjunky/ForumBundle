<?php

namespace Nico\ForumBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ForumType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('title');
        $builder->add('description');
        $builder->add('parent');
    }

    public function getName()
    {
        return 'forum';
    }
}
