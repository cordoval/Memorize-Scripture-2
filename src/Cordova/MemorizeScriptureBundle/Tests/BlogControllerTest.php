<?php

namespace Vendor\FirstBundle\Tests\Controller;
 
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
 
class BlogControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = $this->createClient();
 
        $crawler = $client->request('GET', '/');
 	
        $this->assertTrue($client->getResponse()->getStatusCode() == '200' );
 
        $this->assertTrue($crawler->filter('title:contains("Home")')->count() > 0);
 
        //$this->assertTrue($crawler->filter('h2:contains("Welcome! Ready to memorize Scripture? Let\'s go!")')->count() > 0);
	$this->assertTrue($crawler->filter('h2.post_title')->count() > 0);
    }
}
