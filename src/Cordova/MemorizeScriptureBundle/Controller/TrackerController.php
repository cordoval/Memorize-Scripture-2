<?php

namespace Cordova\MemorizeScriptureBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

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

    public function addRecitationAction($id)
    {
        // id is going to be the value to get the entity
        $em = $this->get('doctrine.orm.entity_manager');

        /*
           we can read first value from db whether it is yes or no
           then we fetch the value from the id send meaning that
           button has been clicked, then update the final value
           from database by toggling it back and forth
          */

        //$users = $em->getRepository('Cordova\MemorizeScriptureBundle\Entity\User')->getLatestUsers()->;
        
        //so here we take $punch and return it in the array
        $arr = array(
                "id" => $id,
                "someother" => "luis"
        );
        return new Response(json_encode($arr));
    }
}
