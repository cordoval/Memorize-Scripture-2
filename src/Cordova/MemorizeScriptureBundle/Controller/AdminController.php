<?php

// AdminController.php
 
namespace Vendor\FirstBundle\Controller;
 
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
 
class AdminController extends Controller
{
    public function indexAction()
    {
        return $this->render('VendorFirst:Admin:index.html.twig');
    }
}
