<?php

namespace blogger\BloggerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name="")
    {
        $name = "test1";
        return $this->render('bloggerBloggerBundle:Default:index.html.twig', array('name' => $name));
    }

    public function aboutAction()
    {
        return $this -> render('bloggerBloggerBundle:Default:about.html.twig');
    }

    public function contactsAction()
    {
        return $this -> render('bloggerBloggerBundle:Default:contacts.html.twig');
    }
}
