<?php

namespace EvenementBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EvenementType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nomE')
            ->add('capaciteE')
            ->add('description',TextareaType::class,['attr'=>['maxlength'=>255]])
            ->add('imgE',FileType::class, ['data_class' => null , 'required'=> false])
            ->add('prixE')
            ->add('dateD')
            ->add('categorieEvenement',EntityType::class,array('class'=>'EvenementBundle:categorieEvenement','choice_label'=>'nomCategorieEvenement','multiple'=>false))
            ->add('Valider',SubmitType::class);    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'EvenementBundle\Entity\Evenement'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'evenementbundle_evenement';
    }


}
