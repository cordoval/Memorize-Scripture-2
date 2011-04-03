<?php

// PagesController.php
 
namespace Vendor\FirstBundle\Controller;
 
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
 
class PagesController extends Controller
{
    public function showAction($page)
    {
        return $this->render(
            sprintf( 'VendorFirst:Pages:%s.html.twig', $page )
        );
    }
}
