<?php
/**
 * Implements a form class for Entity\Deck.
 *
 * @author Maykel S. Braz <maykelsb@yahoo.com.br>
 */

namespace ApiBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;

class DeckType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('project', EntityType::class, [
            'class' => 'ApiBundle:Project',
            'query_builder' => function(EntityRepository $er) {
                return $er->createQueryBuilder('d')
                    ->orderBy('d.name', 'ASC');
            },
            'choice_label' => 'name',
        ])
            ->add('name')
            ->add('description')
            ->add('save', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => 'ApiBundle\Entity\Deck'
        ]);
    }
}
