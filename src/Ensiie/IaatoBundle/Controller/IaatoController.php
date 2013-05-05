<?php


namespace Ensiie\IaatoBundle\Controller;         
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;


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
}




                                                                   
?>
