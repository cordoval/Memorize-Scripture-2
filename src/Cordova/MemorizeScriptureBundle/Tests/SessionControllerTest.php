<?php

namespace Vendor\FirstBundle\Tests\Controller;
 
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
 
class SessionControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = $this->createClient();
 
        $crawler = $client->request('GET', '/session');
 	
        $this->assertTrue($client->getResponse()->getStatusCode() == '200' );
 
        $this->assertTrue($crawler->filter('title:contains("Home")')->count() > 0);
 
        $this->assertTrue($crawler->filter('h2:contains("Session")')->count() > 0);
    }
}
