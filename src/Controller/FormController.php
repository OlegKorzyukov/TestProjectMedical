<?php

namespace App\Controller;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;


class FormController extends AbstractType
{
    public function formBuilder(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('supplies_name', TextType::class)
            ->add('supplies_type', TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Отправить']);
    }
}
