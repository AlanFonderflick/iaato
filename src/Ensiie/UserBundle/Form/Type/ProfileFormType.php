<?php
namespace Ensiie\UserBundle\Form\Type;
 
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;
use Symfony\Component\Form\FormBuilder;
 
class ProfileFormType extends BaseType
{
    public function buildUserForm(FormBuilder $builder, array $options)
    {
        parent::buildUserForm($builder, $options);
        // add your custom field
        $builder->add('name')
                ->add('firstName')
                ->add('phone')
                ->add('ship')                
                ;
    }
 
    public function getName()
    {
        return 'iaato_user_profileformtype';
    }
}
?>
