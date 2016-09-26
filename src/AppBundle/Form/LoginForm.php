<?php
/**
 * Created by PhpStorm.
 * User: nkprince007
 * Date: 26/09/16
 * Time: 4:53 PM
 */

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;

class LoginForm extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder->add('_username')
                ->add('_password',PasswordType::class);
    }

}