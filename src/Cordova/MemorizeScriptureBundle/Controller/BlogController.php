<?php

// BlogController.php
 
namespace Vendor\FirstBundle\Controller;
 
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
 
class BlogController extends Controller
{
    public function indexAction()
    {
	$em = $this->get('doctrine.orm.entity_manager');
	$posts = $em->getRepository('Vendor\FirstBundle\Entity\Post')->getLatestPosts();
        //return $this->render('VendorFirst:Blog:index.html.twig');
	return $this->render(
		'VendorFirst:Blog:index.html.twig',
		array(
			'posts' => $posts
		)
	);
    }
}
