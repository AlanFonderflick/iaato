<?php


namespace Ensiie\IaatoBundle\Controller;         
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class IaatoController extends Controller
{
    public function indexAction()
    {
        $liste = $this->getDoctrine()
                      ->getManager()
                      ->getRepository('EnsiieIaatoBundle:Planning')
                      ->findAll();

        return $this->render('EnsiieIaatoBundle:Iaato:index.html.twig',
            array('plannings' => $liste)
        );
    }

    public function sortDateAction()
    {
        $liste = $this->getDoctrine()
                      ->getManager()
                      ->getRepository('EnsiieIaatoBundle:Planning')
                      ->trieDate();

        return $this->render('EnsiieIaatoBundle:Iaato:index.html.twig',
            array('plannings' => $liste)
        );
    }
    public function sortShipAction()
    {

        $liste = $this->getDoctrine()
                      ->getManager()
                      ->getRepository('EnsiieIaatoBundle:Planning')
                      ->trieShip();

        return $this->render('EnsiieIaatoBundle:Iaato:index.html.twig',
            array('plannings' => $liste)
        );
    }
    public function sortCompanyAction()
    {

        $liste = $this->getDoctrine()
                      ->getManager()
                      ->getRepository('EnsiieIaatoBundle:Planning')
                      ->trieCompany();

        return $this->render('EnsiieIaatoBundle:Iaato:index.html.twig',
            array('plannings' => $liste)
        );
    }
    
    
}




                                                                   
?>
