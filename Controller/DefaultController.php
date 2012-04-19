<?php

namespace Lb\RssrBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;


class DefaultController extends Controller
{
    
    public function indexAction($name)
    {
        return $this->render('LbRssrBundle:Default:index.html.twig', array('name' => $name));
    }
}
