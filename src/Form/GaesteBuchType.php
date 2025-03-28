<?php

namespace App\Form;

use App\Entity\GaesteBuchEntity;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class GaesteBuchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username',TextType::class,['empty_data' => '', 'label' => 'Name'])
            ->add('subtitle',TextType::class,['empty_data' => '', 'label' => 'Titel'])
            ->add('body',TextType::class,['empty_data' => '', 'label' => 'Eintrag'])
            ->add('email',TextType::class,['required' => false, 'label' => 'E-mail'])
            ->add('submit',SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => GaesteBuchEntity::class,
        ]);
    }
}
