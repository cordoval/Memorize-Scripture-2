<?php

namespace Cordova\MemorizeScriptureBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TrackerController extends Controller
{
    public function indexAction()
    {
        //return $this->render('MemorizeScripture:Tracker:index.html.twig');
	    $em = $this->get('doctrine.orm.entity_manager');
        $users = $em->getRepository('Cordova\MemorizeScriptureBundle\Entity\User')->getLatestUsers();
        //$session = $em->getRepository('Cordova\MemorizeScriptureBundle\Entity\Session')->getLatestSession();
	    //$sessionverses = $em->getRepository('Cordova\MemorizeScriptureBundle\Entity\SessionVerse')->getLatestSessionVerses();

	    return $this->render(
		    'MemorizeScripture:Tracker:index.html.twig',
		        array(
                    'users' => $users,
                    //'sessionverses' => $sessionverses;
		        )
	    );
    }
    
    public function welcomeAction()
    {
        return $this->render('MemorizeScripture:Tracker:index.html.twig');
    }

    public function addRecitationAction($punch)
    {
        /*return $this->render(
            sprintf( 'MemorizeScripture:Pages:%s.html.twig', $page )
        );*/
        // $punch is a parameter passed by the xhr

        //so here we take $punch and return it in the array
        $arr = array("punch" => $punch);
        return new Response(json_encode($arr));
    }
}
