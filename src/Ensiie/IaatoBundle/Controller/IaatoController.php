<?php


namespace Ensiie\IaatoBundle\Controller;         
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class IaatoController extends Controller
{
    public function indexAction()
    {
        return new Response("Hello World!");
    }
    
}




                                                                   
?>
