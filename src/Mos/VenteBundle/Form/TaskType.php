<?php
namespace Mos\VenteBundle\Form;

use Mos\VenteBundle\Entity\Task;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('description');
        $builder->add('gender', ChoiceType::class, array(
            'choices'   => array('m' => 'Masculin', 'f' => 'Féminin'),
            'mapped'=>false,
            'compound'=>true,
            'preferred_choices' => array('m'),

        ));
        $builder->add('tags', CollectionType::class, array(
            'entry_type' => TagType::class,
            'allow_add'    => true,
        ));
    }
    protected function loadChoiceList()
    {
        $array = array(
            'Preview' => 'Preview',
            'Hidden'  => 'Hidden',
            'Live'    => 'Live'
        );
        $choices = new SimpleChoiceList($array);

        return $choices;
    }
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Task::class,
        ));
    }
}