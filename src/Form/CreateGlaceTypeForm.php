<?php

namespace App\Form;

use App\Entity\Glaces;
use App\Entity\TypeCone;
use Vich\UploaderBundle\Entity\File;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
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
            ])
            ->add('imageFile', FileType::class, [
                'required' => false,
                'mapped' => true,
                'constraints' => [
                    new File([
                        'maxSize' => '4M',
                        'mimeTypes' => [
                            'image/jpeg',
                            'image/png',
                            'image/gif',
                        ],
                        'mimeTypesMessages' => 'Veuillez uploader une image valide (JPEG, MNG,GIF).',
                    ])
                ],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Glaces::class,
        ]);
    }
}
