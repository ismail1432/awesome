<?php

namespace App\Form;

use App\Entity\Visitor;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VisitorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname')
            ->add('birthday', BirthdayType::class)
            ->addEventListener(
                FormEvents::POST_SUBMIT,
                array($this, 'onPostSubmit')
            )
        ;
    }

    public function onPostSubmit(FormEvent $event)
    {
        $visitor = $event->getData();
        $visitor->setAge();
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // uncomment if you want to bind to a class
            'data_class' => Visitor::class,
        ]);
    }
}
