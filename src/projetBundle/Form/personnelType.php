<?php

namespace projetBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class personnelType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('nom',null,array('attr'=>['placeholder'=>'Il faut au min 12 caractères']))
        ->add('image',FileType::class,['data_class' => null , 'required'=> false],null,array('attr'=>['placeholder'=>'Il faut au min 12 caractères']))
        ->add('description',null,array('attr'=>['placeholder'=>'Il faut au min 120 caractères']))
        ->add('type',ChoiceType::class,array('choices'=>['enseignant'=>'enseignant','concierge'=>'concierge','surveillant'=>'surveillant','Directeur'=>'Directeur']))
        ->add('prenom',null,array('attr'=>['placeholder'=>'Il faut au min 12 caractères']))
        ->add('dateDebTravail',null,array('attr'=>['placeholder'=>'Date de début ne doit pas être vide']))
        ->add('soldeConge',null,array('attr'=>['placeholder'=>'Solde de congé ne doit pas être vide']))
        ->add('Envoyer',SubmitType::class);
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'projetBundle\Entity\personnel'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'projetbundle_personnel';
    }


}
