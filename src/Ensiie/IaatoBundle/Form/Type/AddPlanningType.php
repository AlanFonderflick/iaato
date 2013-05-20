<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
namespace Ensiie\IaatoBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
 
class AddPlanningType extends AbstractType
{
    public $sites;
    public $ships;
    
    function __construct($sites, $ships)
    {
        $this->sites = $sites;
        $this->ships = $ships;
    }
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
       
        $sites = $this->sites;
        $ships = $this->ships;
        
        $builder->add('day','date')
                ->add('ship','choice',array(
                      'choice_list' => $ships,
                      'required' => true,
                      'empty_value' => 'Choose a ship',
                      'empty_data'  => null)
                     )
                ->add('site_1','choice',array(
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
        return 'add_planning';
    }
}
?>
