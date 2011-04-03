<?php

namespace Vendor\FirstBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
 
class PagesControllerTest extends WebTestCase
{
    public function testShow()
    {
        $client = $this->createClient();
 
        $crawler = $client->request('GET', '/about');
 
        $this->assertTrue($client->getResponse()->getStatusCode() == '200' );
 
        $this->assertTrue($crawler->filter('title:contains("About")')->count() > 0);
 
        $this->assertTrue($crawler->filter('h2:contains("About")')->count() > 0);
    }
}
