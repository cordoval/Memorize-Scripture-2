<?php

namespace Vendor\FirstBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('VendorFirst:Default:index.html.twig');
    }
}
