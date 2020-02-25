<?php

namespace projetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class eleveType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',null,array('attr'=>['placeholder'=>'Il faut au min 12 caractères']))
            ->add('prenom',null,array('attr'=>['placeholder'=>'Il faut au min 12 caractères']))
            ->add('adressMail',null,array('attr'=>['placeholder'=>'address@mail.com']))
            ->add('image',FileType::class,['data_class' => null , 'required'=> false])

            ->add('sexe',ChoiceType::class,array('choices'=>['masculin'=>'masculin','féminin'=>'féminin'],'expanded'=>true))


            ->add('parents')
            ->add('Age',null,array('attr'=>['placeholder'=>'Il faut au min 6 ans']))

            ->add('Envoyer',SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'projetBundle\Entity\eleve'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'projetbundle_eleve';
    }


}
