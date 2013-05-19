<?php


namespace Ensiie\IaatoBundle\Controller;         
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Bridge\Doctrine\Form\ChoiceList\EntityChoiceList;
use Symfony\Component\Security\Core\SecurityContext;
use Ensiie\IaatoBundle\Entity\Planning;
use Ensiie\UserBundle\Entity\User;
use Ensiie\IaatoBundle\Entity\Site;
use Ensiie\IaatoBundle\Form\Type\EditPlanningType;
use Ensiie\IaatoBundle\Form\Type\AddPlanningType;

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
                        ->findBy(array('id' => $id));
        $request = $this->get('request');
        if( ! in_array($planning[0], $this->sortMe()))
              throw new AccessDeniedHttpException('You cannot edit another\'s planning');
                             
               
        $user = $this->get('security.context')->getToken()->getUser();
        $sites = new EntityChoiceList($em,'Ensiie\IaatoBundle\Entity\Site'); 
        
        $form = $this->createForm(new EditPlanningType($sites), $planning[0]);
              
            if ($request->getMethod() == 'POST')
            {
              $conflits = $this->getConflict($form);
              if(! empty($conflits))
                      return $this->render('EnsiieIaatoBundle:Iaato:planning_edit.html.twig',array(
                        'planning' => $planning,      
                        "form"=>$form->createView(),   
                       'success'=>'',
                        'error' => 'Conflict with another planning',
                         'conflits' => $conflits
                        )
                      );                        
              $form->bind($request);
              if($form->isValid())
              {        
                  
                  $em->flush();
              
                  return $this->render('EnsiieIaatoBundle:Iaato:planning_edit.html.twig',array(
                    'planning' => $planning,      
                    "form"=>$form->createView(),   
                   'success'=>'Success',
                   'error' => '',
                    'conflits' => array()
                    )
                  );
              }
            }
            
            return $this->render('EnsiieIaatoBundle:Iaato:planning_edit.html.twig',array(
                'planning' => $planning,      
                "form"=>$form->createView(),   
               'success'=>'',
                'error' => '',
                'conflits' => array()
                )
            );
    }
    
    public function getConflict($form)
    {
        $my_planning = $form->getData();        
        $plannings = $this->sortDate();
        $conflits = array();
        
        foreach($plannings as $planning)
        {
            if($planning->getDay()->format('Y-m-d') == $my_planning->getDay()->format('Y-m-d')
               && $planning->getId() != $my_planning->getId())
            {
                if($planning->getSite1() == $my_planning->getSite1()
                || $planning->getSite2() == $my_planning->getSite2()
                || $planning->getSite3() == $my_planning->getSite3()
                || $planning->getSite4() == $my_planning->getSite4())
                array_push ($conflits, $planning);
            }           
        }
        return $conflits;  
    }
    
    public function requestFreeSitesAction()
    {
        $em = $this->getDoctrine()
                   ->getManager();
        $request = $this->get('request');
            
        $free_sites = array();
        
        $defaultData = array('message' => 'Type your message here');
        $form = $this->createFormBuilder($defaultData)
             ->add('day','date',array(
                     'mapped' => true,                     
                 ))               
             ->getForm();
        //$default = new \DateTime('now');
        
        if ($request->getMethod() == 'POST')
        {
              $form->bind($request);
              $plannings = $em->getRepository('EnsiieIaatoBundle:Planning')
                              ->findByDay($form->get('day')->getData());
              $sites = $em->getRepository('EnsiieIaatoBundle:Site')
                          ->findAll();                        
              
              foreach( $sites as $site)
              {
                  $dispos = array( 1 => true, 2 => true, 3 => true, 4 => true);
                  
                  foreach ($plannings as $planning)
                  {
                      if($planning->getSite1()->getId() == $site->getId())
                            $dispos[1] = false;
                      if($planning->getSite2()->getId() == $site->getId())
                            $dispos[2] = false;
                      if($planning->getSite3()->getId() == $site->getId())
                            $dispos[3] = false;
                      if($planning->getSite4()->getId() == $site->getId())
                            $dispos[4] = false;
                  }
                  $free_sites[$site->getName()] = $dispos;
              }
              
              return $this->render('EnsiieIaatoBundle:Iaato:request_free_sites.html.twig', array(
                    'form' => $form->CreateView(),
                    'sites' => $free_sites
                ));
        }
        return $this->render('EnsiieIaatoBundle:Iaato:request_free_sites.html.twig', array(
                    'form' => $form->CreateView(),
                    'sites' => $free_sites
                ));
    }
    
    public function addPlanningAction()
    {
         $em = $this->getDoctrine()
                    ->getManager();
        $planning = new Planning();        
        
        $request = $this->get('request');
                                                   
        $sites = new EntityChoiceList($em,'Ensiie\IaatoBundle\Entity\Site');
        $ships = new EntityChoiceList($em,'Ensiie\IaatoBundle\Entity\Ship');
        
        $form = $this->createForm(new AddPlanningType($sites,$ships), $planning);
        
        if ($request->getMethod() == 'POST')
            {                                  
              $form->bind($request);
              
              if($form->isValid())
              {   
                  $em->persist($planning);
                  $em->flush();
                  
                  $this->get('session')->setFlash('notice', 'Your changes were saved!'); 
            //      return $this->redirect($this->generateUrl('iaato_planning'));
              }
            }
            $plannings = $this->sortDate();
            
            return $this->render('EnsiieIaatoBundle:Iaato:planning_add.html.twig',array(    
                    "form" => $form->createView(), 
                    "plannings" => $plannings
                    )
                  );
    }
    
}




                                                                   
?>
