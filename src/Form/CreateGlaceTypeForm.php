<?php

namespace App\Form;

use App\Entity\Glaces;
use App\Entity\TypeCone;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CreateGlaceTypeForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
             ->add('nom')
            ->add('ingredientSpecial', TextType::class, [
                'required' => false,
                'label' => 'Ingrédient spécial'
            ])
            ->add('typeCone', EntityType::class, [
            'class' => TypeCone::class,
            'choice_label' => 'nom',
            'label' => 'Type de cône',
            'placeholder' => 'Choisissez un type de cône'
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Glaces::class,
        ]);
    }
}
