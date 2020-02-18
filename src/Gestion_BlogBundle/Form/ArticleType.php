<?php

namespace Gestion_BlogBundle\Form;

use Ivory\CKEditorBundle\Form\Type\CKEditorType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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
                        'maxSize' => '1024k',// 1MB
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
                'config_name'       => 'my_custom_config',
                'config' => array(
                    'language'    => 'fr'
                ),
            ))
            ->add('categorie')
            ->add('tags');
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
