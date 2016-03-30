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
                    'A-' => 'a-',
                    'A+' => 'a+',
                    'B-' => 'b-',
                    'B+' => 'b+',
                    'AB+' => 'ab+',
                    'AB-' => 'ab-',
                    'O+' => 'o+',
                    'O-' => 'o-',
                ]))
            ->add('rhFactor', ChoiceType::class, array(
                'choices_as_values' => true,
                'choices' => [
                    '' => '',
                    'Rh+' => 'rh+',
                    'Rh-' => 'rh-',
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