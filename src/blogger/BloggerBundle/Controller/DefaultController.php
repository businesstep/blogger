<?php

namespace blogger\BloggerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('bloggerBloggerBundle:Default:index.html.twig', array('name' => $name));
    }
}
