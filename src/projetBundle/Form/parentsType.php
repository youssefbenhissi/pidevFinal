<?php

namespace projetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class parentsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom',null,array('attr'=>['placeholder'=>'Il faut au min 12 caractères']))
            ->add('image',FileType::class,['data_class' => null , 'required'=> false])
            ->add('prenom',null,array('attr'=>['placeholder'=>'Il faut au min 12 caractères']))
            ->add('numTelephone',null,array('attr'=>['placeholder'=>'Il faut 8 chiffres']))
            ->add('adressMail',null,array('attr'=>['placeholder'=>'address@mail.com']))
            ->add('Envoyer',SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'projetBundle\Entity\parents'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'projetbundle_parents';
    }


}
