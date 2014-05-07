<?php

namespace blogger\BloggerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use blogger\BloggerBundle\Entity\Enquiry;
use blogger\BloggerBundle\Form\EnquiryType;

class DefaultController extends Controller
{
    public function indexAction($name="")
    {
        $name = "test1";
        return $this->render( 'bloggerBloggerBundle:Default:index.html.twig', array('name' => $name) );
    }

    public function aboutAction()
    {
        return $this -> render( 'bloggerBloggerBundle:Default:about.html.twig' );
    }

    public function contactsAction()
    {
        $enquiry = new Enquiry();

        $form = $this -> createForm( new EnquiryType(), $enquiry );

        $request = $this -> getRequest();

        if( $request -> getMethod() == 'POST' )
        {
            //$form -> bindRequest( $request );
            $form -> bind( $this -> getRequest() );

            if( $form -> isValid() )
            {
                $message = \Swift_Message::newInstance()
                            -> setSubject('Contact from Blogger')
                            -> setFrom('admin@blogger.com')
                            -> setTo( $this -> container -> getParameter('blogger_blog.emails.contact_email') )
                            -> setBody( $this -> renderView('bloggerBloggerBundle:Default:contactEmail.txt.twig', array('enquiry' => $enquiry)) );

                $this -> get('mailer') -> send($message);

                //$this -> get('session') -> setFlash('blogger-notice', 'Send was successful. Thank you.');
                $this -> get('session') -> getFlashBag() -> add('blogger-notice', 'Send was successful. Thank you.');

                
                return $this -> redirect( $this -> generateUrl('blogger_blogger_contacts') );
            }
        }


        return $this -> render( 'bloggerBloggerBundle:Default:contacts.html.twig', array('form' => $form -> createView()) );
    }
}
