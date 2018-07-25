<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use AppBundle\Entity\Job;

class JobType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('category')
            ->add('type', 'choice', array('choices' => Job::getTypes(), 'expanded' => true))
            ->add('company')
            ->add('logo', 'file', array('label' => 'Company Logo', 'required' => false))
            ->add('url', null, array('label' => 'Company URL', 'required' => false))
            ->add('position')
            ->add('location')
            ->add('description')
            ->add('howToApply', null, array('label' => 'How to Apply?'))
            ->add('isPublic', null, array('label' => 'Public?'))
            ->add('email');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Job'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_job';
    }


}
