<?php

namespace Lb\RssrBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class SourceType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
        	->add('name')
            ->add('url')
            ->add('rss')
        ;
    }

    public function getName()
    {
        return 'lb_rssrbundle_sourcetype';
    }
}
