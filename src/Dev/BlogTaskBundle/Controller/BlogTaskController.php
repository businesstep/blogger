<?php

namespace Dev\BlogTaskBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Dev\BlogTaskBundle\Entity\BlogTask;
use Dev\BlogTaskBundle\Form\BlogTaskType;

/**
 * BlogTask controller.
 *
 * @Route("/blogtask")
 */
class BlogTaskController extends Controller
{

    /**
     * Lists all BlogTask entities.
     *
     * @Route("/", name="blogtask")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('DevBlogTaskBundle:BlogTask')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new BlogTask entity.
     *
     * @Route("/", name="blogtask_create")
     * @Method("POST")
     * @Template("DevBlogTaskBundle:BlogTask:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new BlogTask();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('blogtask_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a BlogTask entity.
    *
    * @param BlogTask $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(BlogTask $entity)
    {
        $form = $this->createForm(new BlogTaskType(), $entity, array(
            'action' => $this->generateUrl('blogtask_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new BlogTask entity.
     *
     * @Route("/new", name="blogtask_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new BlogTask();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a BlogTask entity.
     *
     * @Route("/{id}", name="blogtask_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DevBlogTaskBundle:BlogTask')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlogTask entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing BlogTask entity.
     *
     * @Route("/{id}/edit", name="blogtask_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DevBlogTaskBundle:BlogTask')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlogTask entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a BlogTask entity.
    *
    * @param BlogTask $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(BlogTask $entity)
    {
        $form = $this->createForm(new BlogTaskType(), $entity, array(
            'action' => $this->generateUrl('blogtask_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing BlogTask entity.
     *
     * @Route("/{id}", name="blogtask_update")
     * @Method("PUT")
     * @Template("DevBlogTaskBundle:BlogTask:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('DevBlogTaskBundle:BlogTask')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find BlogTask entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('blogtask_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a BlogTask entity.
     *
     * @Route("/{id}", name="blogtask_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('DevBlogTaskBundle:BlogTask')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find BlogTask entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('blogtask'));
    }

    /**
     * Creates a form to delete a BlogTask entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('blogtask_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
