<?php

namespace Gestion_BlogBundle\Form;

use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class ArticleType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('titre')
            ->add('image',FileType::class,[
                'label' => "Miniature d'article",
                'data_class' => null,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '5120k',// 5MB
                        'mimeTypes' => [ //types
                            'image/jpeg',
                            'image/jpg',
                        ],
                        'mimeTypesMessage' => 'SVP sélectionner une image JPEG',
                    ]),

                ],
            ])
            ->add('contenu',CKEditorType::class, array (
                'label'             => 'Contenu',
                'config_name'       => 'my_custom_alaa',
                'config' => array(
                    'language'    => 'fr',
                    'skin'        => 'office2013',
                ),
            ))
            ->add('categorie')
            ->add('tags')
            ->add('type',ChoiceType::class, [
                'choices' => [
                    'A Publier' => true,
                    'Brouillon' => false,
                ],
            ]);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Gestion_BlogBundle\Entity\Article'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'gestion_blogbundle_article';
    }


}
