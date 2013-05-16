<?php


namespace Ensiie\IaatoBundle\Controller;         
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Bridge\Doctrine\Form\ChoiceList\EntityChoiceList;
use Symfony\Component\Security\Core\SecurityContext;
use Ensiie\Bundle\UserBundle\Entity\Planning;
use Ensiie\Bundle\UserBundle\Entity\User;
use Ensiie\Bundle\UserBundle\Entity\Site;


class IaatoController extends Controller
{
    public function indexAction()
    {
    
            return $this->render('EnsiieIaatoBundle:Iaato:account.html.twig');
    }
    public function planningAction($sort)
    { 
        switch($sort)
        {
            case "date":
                $liste = $this->sortDate();
                break;
            case "ship":
                $liste = $this->sortShip();
                break;
            case "company":
                $liste = $this->sortCompany();
                break;
            case "me":
                $liste = $this->sortMe();
                break;
        }

        return $this->render('EnsiieIaatoBundle:Iaato:planning.html.twig',
            array('plannings' => $liste)
        );
    } 
    public function adminAction()
    {
        if( ! $this->get('security.context')->isGranted('ROLE_ADMIN') )
        {
            // Sinon on déclenche une exception "Accès Interdit"
             throw new AccessDeniedHttpException('Access restricted to the Admin.');
        }
        
        $liste_users = $this->getDoctrine()
                            ->getManager()
                            ->getRepository('EnsiieUserBundle:User')
                            ->findAll();

        return $this->render('EnsiieIaatoBundle:Iaato:admin.html.twig',
            array('users' => $liste_users)
        );
    } 

    public function sortDate()
    {
        $liste = $this->getDoctrine()
                      ->getManager()
                      ->getRepository('EnsiieIaatoBundle:Planning')
                      ->trieDate();

        return $liste;
    }
    public function sortShip()
    {

        $liste = $this->getDoctrine()
                      ->getManager()
                      ->getRepository('EnsiieIaatoBundle:Planning')
                      ->trieShip();
        return $liste;
    }
    public function sortCompany()
    {

        $liste = $this->getDoctrine()
                      ->getManager()
                      ->getRepository('EnsiieIaatoBundle:Planning')
                      ->trieCompany();
        return $liste;
    }
    public function sortMe()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();

        $liste = $this->getDoctrine()
                      ->getManager()
                      ->getRepository('EnsiieIaatoBundle:Planning')
                      ->trieMe($user);
        return $liste;
    }
    public function editPlanningAction($id)
    {
        $em = $this->getDoctrine()
                    ->getManager();
        $planning = $em->getRepository('EnsiieIaatoBundle:Planning')
                        ->findOneBy(array('id' => $id));
        /*if( ! in_array($planning, $this->sortMe()))
              throw new AccessDeniedHttpException('You cannot edit another\'s planning');*/
         
        
             
               
        $user = $this->get('security.context')->getToken()->getUser();
        $sites = new EntityChoiceList($em,'Ensiie\IaatoBundle\Entity\Site');     
        
        $form = $this->createFormBuilder($planning)
                     ->add('site1','choice',array(
                           'choice_list' => $sites,
                           'required' => true,
                           'empty_value' => 'Choose a site',
                           'empty_data'  => null)
                           )              
                     ->add('site2','choice',array(
                           'choice_list' => $sites,
                           'required' => true,
                           'empty_value' => 'Choose a site',
                           'empty_data'  => null)
                           )
                    ->add('site3','choice',array(
                           'choice_list' => $sites,
                           'required' => true,
                           'empty_value' => 'Choose a site',
                           'empty_data'  => null)
                           )
                    ->add('site4','choice',array(
                           'choice_list' => $sites,
                           'required' => true,
                           'empty_value' => 'Choose a site',
                           'empty_data'  => null)
                           )
                        ->getForm();
                     
            return $this->render('EnsiieIaatoBundle:Iaato:planning_edit.html.twig',array(
                'planning' => $planning,      
                "form"=>$form->createView(),
                "error"=>'',
               'success'=>'',
                )
        );
    }
}




                                                                   
?>
