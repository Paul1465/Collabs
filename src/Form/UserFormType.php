<?php

namespace App\Form;

use App\Entity\User;
use Doctrine\DBAL\Types\TextType;
use App\Form\ApplicationType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UserFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('first_name',null, [
                'empty_data' => 'Nom inconnu',
                'label' => 'Nom'
            ])
            ->add('last_name',null, [
                'empty_data' => 'Prénom inconnu',
                'label' => 'Prénom'
            ])
            ->add('picture',null, [
                'empty_data' => 'Pas de photo',
                'label' => 'Photo'
            ])
            ->add('introduction',null, [
                'empty_data' => 'Pas d\'introduction',
                'label' => 'Introduction'
            ])
            ->add('description',null, [
                'empty_data' => 'Pas de description',
                'label' => 'Description'
            ])
            ->add('slug',null, [
                'empty_data' => 'Pas de slug',
                'label' => 'Slug'
            ])
            ->add('save', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-primary mt-3'
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
