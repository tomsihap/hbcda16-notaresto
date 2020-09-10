<?php

namespace App\Form;

use App\Entity\Review;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\GreaterThanOrEqual;
use Symfony\Component\Validator\Constraints\LessThanOrEqual;

class ReviewType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('content')
            ->add('rating', IntegerType::class, [
                'attr' => [
                    // attributs HTML de l'input
                ],
                'label_attr' => [
                    // attributs HTML du label
                ],
                'constraints' => [
                    new LessThanOrEqual([
                        'value' => 5,
                        'message' => "La valeur {{ value }} saisie est supérieure à la note maximale de {{ compared_value }}."
                    ]),
                    new GreaterThanOrEqual([
                        'value' => 1,
                        'message' => "La valeur {{ value }} saisie est inférieure à la note minimale de {{ compared_value }}."
                    ])
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Review::class,
        ]);
    }
}
