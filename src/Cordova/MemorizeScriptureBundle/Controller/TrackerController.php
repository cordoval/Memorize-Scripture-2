<?php

namespace Cordova\MemorizeScriptureBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Cordova\MemorizeScriptureBundle\Entity\Session;

class TrackerController extends Controller
{
    /* displays user dashboard */
    public function indexAction()
    {
        //$user = $this->container->get('security.context')->getToken()->getUser();

	    return $this->render(
		    'MemorizeScriptureBundle:Tracker:index.html.twig'
                    //,
	//	        array(
        //           'user' => $user,
	//	        )
	    );
    }


    public function welcomeAction()
    {
        return $this->render('MemorizeScriptureBundle:Tracker:index.html.twig');
    }

    /* ajax function to toogle recited yes or no */
    public function addRecitationAction($id)
    {
        $em = $this->get('doctrine.orm.entity_manager');

        $sessionverse = $em->find('Cordova\MemorizeScriptureBundle\Entity\SessionVerse',$id);
        $Recitedyesno = $sessionverse->getRecitedyesno();
        if ($Recitedyesno == 'yes') {
            $sessionverse->setRecitedyesno('no');
        } else {
            $sessionverse->setRecitedyesno('yes');
        }
        $Recitedyesno = $sessionverse->getRecitedyesno();
        $em->flush();

        $arr = array(
                "id" => $id,
                "Recitedyesno" => $Recitedyesno,
                "someother" => "luis"
        );
        return new Response(json_encode($arr));
    }

    /* create new session for current user with a given $title as title */
    public function createSessionAction($title = 'sample')
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $session = new Session();
        $session->setTitle($title);

        $user = $this->container->get('security.context')->getToken()->getUser();
             
        $user->addSession($session);
        
        // sets the session active on user object 
        $session->setActive();

	$em->persist($session);

        $em->flush();

        $arr = array(
                "newsessiontitle" => "$title"
        );
        return new Response(json_encode($arr));
    }
    
    function makeSessionActiveAction($id) {

        $user = $this->container->get('security.context')->getToken()->getUser();
        
        // uses id to set the session active belonging to that id active on user
        $user->setActiveSession($id);
        
        $arr = array(
                "newsessiontitle" => "$title"
        );
        return new Response(json_encode($arr));
    }
    
    public function nameAction() {
        
    }
}
