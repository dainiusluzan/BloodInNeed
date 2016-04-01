<?php
// src/UserBundle/Form/RegistrationType.php

namespace UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName', null, array('label' => 'form.firstName', 'translation_domain' => 'FOSUserBundle'))
            ->add('lastName', null, array('label' => 'form.lastName', 'translation_domain' => 'FOSUserBundle'))
            ->add('town', EntityType::class, array(
                'class' => 'UserBundle:Town',
                'choice_label' => 'town',
                'label' => 'form.town',
                'translation_domain' => 'FOSUserBundle'
            ))
            ->add('phone', null, array('label' => 'form.phone', 'translation_domain' => 'FOSUserBundle'))
            ->add('age', null, array('label' => 'form.age', 'translation_domain' => 'FOSUserBundle'))
            ->add('bloodType',ChoiceType::class, array(
                'choices_as_values' => true,
                'label' => 'form.bloodType',
                'translation_domain' => 'FOSUserBundle',
                'placeholder' => '',
                'choices' => [
                    'A-' => 'A-',
                    'A+' => 'A+',
                    'B-' => 'B-',
                    'B+' => 'B+',
                    'AB+' => 'AB+',
                    'AB-' => 'AB-',
                    'O+' => 'O+',
                    'O-' => 'O-',
                ]))
        ;
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\RegistrationFormType';

        // Or for Symfony < 2.8
        // return 'fos_user_registration';
    }

    public function getBlockPrefix()
    {
        return 'app_user_registration';
    }

    // For Symfony 2.x
    public function getName()
    {
        return $this->getBlockPrefix();
    }
}