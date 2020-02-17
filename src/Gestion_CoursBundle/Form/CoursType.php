<?php

namespace Gestion_CoursBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class CoursType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('Description',TextareaType::class, [
                'attr' => ['rows' => '6'],'attr' =>[ 'cols' => '50']
            ])
            ->add('pathPdf',FileType::class,[
                'label' => "Fichier PDF",
                'data_class' => null,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '5120k',// 5MB
                        'mimeTypes' => [ //types
                            'application/pdf',
                        ],
                        'mimeTypesMessage' => 'SVP sélectionner un PDF',
                    ]),

                ],
            ]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Gestion_CoursBundle\Entity\Cours'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gestion_coursbundle_cours';
    }


}
