<?php

namespace App\Form;

use App\Entity\Abonner;
use App\Entity\TypeAbonnement;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Config\Doctrine\Orm\EntityManagerConfig\EntityListeners\EntityConfig;

class AbonnementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('typeAbonnement', EntityType::class, [
                'class'=>TypeAbonnement::class,
                'choice_label'=> 'nom'
            ]);
            // ->add('roles')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Abonner::class,
        ]);
    }
}
