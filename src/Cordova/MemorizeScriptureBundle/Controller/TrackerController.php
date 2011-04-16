<?php

namespace Cordova\MemorizeScriptureBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class TrackerController extends Controller
{
    /* displays user dashboard */
    public function indexAction()
    {
        $user = $this->container->get('security.context')->getToken()->getUser();

	    return $this->render(
		    'MemorizeScriptureBundle:Tracker:index.html.twig',
		        array(
                    'user' => $user,
		        )
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

    /* create new session for current user */
    public function createSessionAction($title = 'sample')
    {
        $em = $this->get('doctrine.orm.entity_manager');
        $session = new Session();
        $session->setTitle($title);

        $user = $this->container->get('security.context')->getToken()->getUser();
        $user->addSession($session);

	    $em->persist($session);
        //$user->userUpdate();
        // do I have to update the user object again here ?
        

        return $this->render(
		    'MemorizeScriptureBundle:Tracker:index.html.twig',
		        array(
                    'user' => $user,
		        )
	    );
    }
}
