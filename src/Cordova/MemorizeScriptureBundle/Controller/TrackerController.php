<?php

namespace Cordova\MemorizeScriptureBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class TrackerController extends Controller
{
    public function indexAction()
    {
        //return $this->render('MemorizeScripture:Tracker:index.html.twig');
	$em = $this->get('doctrine.orm.entity_manager');
	$sessionverses = $em->getRepository('Vendor\FirstBundle\Entity\SessionVerse')->getLatestSessionVerses();
	return $this->render(
		'VendorFirst:Tracker:index.html.twig',
		array(
			'sessionverses' => $sessionverses
		)
	);
    }
    
    public function welcomeAction()
    {
        return $this->render('MemorizeScripture:Tracker:welcome.html.twig');
    }
}
