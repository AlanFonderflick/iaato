<?php


namespace Ensiie\IaatoBundle\Controller;         
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

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
        }

        return $this->render('EnsiieIaatoBundle:Iaato:planning.html.twig',
            array('plannings' => $liste)
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
}




                                                                   
?>
