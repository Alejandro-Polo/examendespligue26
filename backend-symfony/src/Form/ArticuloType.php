<?php

namespace App\Form;

use App\Entity\Articulo;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Formulario para la entidad Articulo.
 *
 * @package App\Form
 */
class ArticuloType extends AbstractType
{
     /**
     * Construye el formulario del artículo.
     *
     * @param FormBuilderInterface $builder Constructor del formulario
     * @param array $options Opciones del formulario
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombre')
            ->add('foto')
            ->add('descripcion')
            ->add('precio')
            ->add('valoracion')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Articulo::class,
        ]);
    }
}
