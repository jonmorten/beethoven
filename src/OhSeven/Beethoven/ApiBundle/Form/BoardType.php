<?php

namespace OhSeven\Beethoven\ApiBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class BoardType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm ( FormBuilderInterface $builder, array $options )
    {
        $builder
            ->add( 'columns' )
            ->add( 'name' )
            ->add( 'filter' )
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions ( OptionsResolverInterface $resolver )
    {
        $resolver->setDefaults( array(
            'data_class' => 'OhSeven\Beethoven\ApiBundle\Entity\Board',
            'csrf_protection' => false
        ) );
    }

    /**
     * @return string
     */
    public function getName ()
    {
        return 'ohseven_beethoven_apibundle_board';
    }
}
