<?php
// src/UserBundle/Form/ProfileType.php

namespace UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ProfileType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstName')
            ->add('lastName')
            ->add('town')
            ->add('phone')
            ->add('age')
            ->add('bloodType',ChoiceType::class, array(
                'choices_as_values' => true,
                'choices' => [
                    '' => '',
                    'a-' => 'A-',
                    'a+' => 'A+',
                    'b-' => 'B-',
                    'b+' => 'B+',
                    'ab+' => 'AB+',
                    'ab-' => 'AB-',
                    'o+' => 'O+',
                    'o-' => 'O-',
                ]))
            ->add('rhFactor', ChoiceType::class, array(
                'choices_as_values' => true,
                'choices' => [
                    '' => '',
                    'rh+' => 'Rh+',
                    'rh-' => 'Rh-',
                ]))
        ;
    }

    public function getParent()
    {
        return 'FOS\UserBundle\Form\Type\ProfileFormType';

        // Or for Symfony < 2.8
        // return 'fos_user_registration';
    }

    public function getBlockPrefix()
    {
        return 'app_user_profile';
    }

    // For Symfony 2.x
    public function getName()
    {
        return $this->getBlockPrefix();
    }
}