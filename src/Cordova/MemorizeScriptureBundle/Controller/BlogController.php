<?php

// BlogController.php
 
namespace Cordova\MemorizeScriptureBundle\Controller;
 
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
 
class BlogController extends Controller
{
    public function indexAction()
    {
	$em = $this->get('doctrine.orm.entity_manager');
	$posts = $em->getRepository('Cordova\MemorizeScriptureBundle\Entity\Post')->getLatestPosts();
        //return $this->render('VendorFirst:Blog:index.html.twig');
	return $this->render(
		'MemorizeScripture:Blog:index.html.twig',
		array(
			'posts' => $posts
		)
	);
    }
}
