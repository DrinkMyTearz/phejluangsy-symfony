<?php

namespace App\Form;

use App\Entity\Produit;
use App\Entity\User;
use App\Entity\Volume;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('image_url')
            ->add('nom_produit')
            ->add('description')
            ->add('type_volume', EntityType::class, [
                'class' => Volume::class,
'choice_label' => 'volume',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
