<?php
namespace App\Form\Type;

use App\Entity\Category;
use App\Entity\Product;
use App\Entity\Supplier;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductFormType extends AbstractType
{
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Product::class
        ]);
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('Product_Name', TextType::class)
        ->add('Price', TextType::class)
        ->add('oldPrice', TextType::class)
        ->add('SmallDesc', TextType::class)
        ->add('DetailDesc', TextType::class)
        ->add('Pro_qty', TextType::class)
        ->add('cat', EntityType::class,[
            'class'=> Category::class,
            'choice_label' => 'CatName'
        ])
        ->add('image', FileType::class)
        ->add('save', SubmitType::class, [
            'label' => "Save!"
        ]);
    }
}
?>
