<?php

namespace Dev\BlogTaskBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BlogTaskType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('task')
            ->add('title')
            ->add('annotation')
            ->add('textbody')
            ->add('created')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Dev\BlogTaskBundle\Entity\BlogTask'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'dev_blogtaskbundle_blogtask';
    }
}
