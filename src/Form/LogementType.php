<?php

namespace App\Form;

use App\Entity\Logement;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Image;

class LogementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('surface', NumberType::class, [
                'label' => 'Superficie : '
            ])
            ->add('numberOfRoom', NumberType::class, [
                'label' => 'Nombre de pièce : '
            ])
            ->add('type', ChoiceType::class, [
                'label' => 'Type de logement : ',
                'choices' => [
                    'Appartement' => 'Appartement',
                    'Maison' => 'Maison',
                    'Yourte' => 'Yourte'
                ]
            ])
            ->add('adress', TextType::class, [
                'label' => 'Superficie : '
            ])
            ->add('isExterior', ChoiceType::class, [
                'label' => 'Garage : ',
                'choices' => [
                    'Oui' => true,
                    'Non' => false
                ]
            ])
            ->add('exteriorSurface', NumberType::class, [
                'label' => 'Superficie extérieur : '
            ])
            ->add('isGarage', ChoiceType::class, [
                'label' => 'Garage : ',
                'choices' => [
                    'Oui' => true,
                    'Non' => false
                ]
            ])
            ->add('modality', ChoiceType::class, [
                'label' => 'Vente ou Location : ',
                'choices' => [
                    'Location' => 'Location',
                    'Vente' => 'Vente'
                ]
            ])
            ->add('price', NumberType::class, [
                'label' => 'Superficie : '
            ])
            ->add('picture', FileType::class, [
                'mapped' => false,
                'constraints' => [
                    new Image([
                        'maxSize' => '5000k',
                        'mimeTypesMessage' => 'Image format not allowed !'
                    ])
                ]
            ])
            ->add('isSwimmingPool', ChoiceType::class, [
                'label' => 'Garage : ',
                'choices' => [
                    'Oui' => true,
                    'Non' => false
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Logement::class,
        ]);
    }
}
