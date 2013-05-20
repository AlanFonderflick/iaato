<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Ensiie\IaatoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
 use Symfony\Component\OptionsResolver\OptionsResolverInterface;
 
class EditPlanningType extends AbstractType
{
    public $sites;
    
    function __construct($sites)
    {
        $this->sites = $sites;
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       
        $sites = $this->sites;
        $builder->add('site_1','choice',array(
                           'choice_list' => $sites,
                           'required' => true,
                           'empty_value' => 'Choose a site',
                           'empty_data'  => null)
                           )
                     ->add('duration_1','time')
                     ->add('site_2','choice',array(
                           'choice_list' => $sites,
                           'required' => true,
                           'empty_value' => 'Choose a site',
                           'empty_data'  => null)
                           )
                    ->add('duration_2','time')
                    ->add('site_3','choice',array(
                           'choice_list' => $sites,
                           'required' => true,
                           'empty_value' => 'Choose a site',
                           'empty_data'  => null)
                           )
                    ->add('duration_3','time')
                    ->add('site_4','choice',array(
                           'choice_list' => $sites,
                           'required' => true,
                           'empty_value' => 'Choose a site',
                           'empty_data'  => null)
                           )
                    ->add('duration_4','time');              
           
    }

   

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ensiie\IaatoBundle\Entity\Planning',
        ));
    }
    public function getName()
    {
        return 'edit_planning';
    }
}
?>
