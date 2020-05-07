<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class UserRegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', null, [
                'label' => 'Nom',
                'attr' => [
                    'class' => 'form-control'
                ],
                'label_attr' => [
                    'class' => 'bmd-label-floating'
                ]
            ])
            ->add('surname', null, [
                'label' => 'Prenom',
                'attr' => [
                    'class' => 'form-control'
                ],
                'label_attr' => [
                    'class' => 'bmd-label-floating'
                    ]
                ])
            ->add('email', null, [
                'label' => 'Email',
                'attr' => [
                    'class' => 'form-control'
                ],
                'label_attr' => [
                    'class' => 'bmd-label-floating'
                    ]
                ])
            ->add('phone', null, [
                'label' => 'Téléphone',
                'attr' => [
                    'class' => 'form-control'
                ],
                'label_attr' => [
                    'class' => 'bmd-label-floating'
                    ]
                ])
            ->add('roles', ChoiceType::class, 
                    [
                        'multiple' => true,
                        'label' => 'Type de compte',
                        'choices' => [
                                        'Passager' => 'PASSENGER',
                                        'Conducteur' => 'DRIVER',
                                        'Conducteur et passager' => 'PASSENGER,DRIVER'
                                ],
                        'attr' => [
                            'class' => 'form-control'
                        ],
                        'label_attr' => [
                            'class' => 'bmd-label-floating'
                        ]
                    ])
            ->add('password', null, [
                'label' => 'Mot de passe',
                'attr' => [
                    'class' => 'form-control'
                ],
                'label_attr' => [
                    'class' => 'bmd-label-floating'
                    ]
                ])
            ->add('imageFile', FileType::class, [
                'label' => 'Photo de profil',
                'required' => false
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
