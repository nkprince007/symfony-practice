<?php
namespace AppBundle\Form;

use AppBundle\Repository\SubFamilyRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GenusFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
            ->add('name')
            ->add('subFamily', null, [
                'placeholder' => 'Choose a Sub Family',
                'query_builder' => function(SubFamilyRepository $repository) {
                    return $repository->createAlphabeticalQueryBuilder();
                }
            ])
            ->add('speciesCount')
            ->add('funFact')
//            ->add('isPublished', ChoiceType::class, [
//                'choices' => [
//                    "Yes" => true,
//                    "No" => false,
//                ]
//            ])
            ->add('isPublished')
            ->add('firstDiscoveredAt', DateType::class, [
                'widget' => 'single_text',
                'html5' => false,
                'attr' => ['class' => 'js-datepicker']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver) {
        $resolver->setDefaults([
            'data_class' => 'AppBundle\Entity\Genus'
        ]);
    }
}

?>