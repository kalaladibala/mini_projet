<?php

namespace App\Form;

use App\Entity\Emprunts;
use App\Entity\Personne;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EmpruntFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateEmprunt', DateType::class, [
            'label'=> "Date d'emprunt",
            'widget'=> "single_text"
            ])
            ->add('dateRetour',  DateType::class, [
                'label'=> "Date de retour",
                'widget'=> "single_text"
                ])
            ->add('personne', EntityType::class, [
                'label'=>'personne',
                'class'=>Personne::class,
                'placeholder' => 'choisir une personne'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Emprunts::class,
        ]);
    }
}
