<?php

namespace Cordova\MemorizeScriptureBundle\Tests\Controller;
 
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
 
class TrackerControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = $this->createClient();

        $crawler = $client->request('GET', '/tracker');

        $crawler = $client->followRedirect();
 	
        $this->assertTrue($client->getResponse()->getStatusCode() == '200' );

        $form = $crawler->selectButton('login')->form();
        
        $crawler = $client->submit($form, array(
            '_username'      => 'cordoval',
            '_password'      => 'password',
        ));

        $crawler = $client->followRedirect();
        
        $crawler = $client->request('GET', '/tracker');

        //$crawler = $client->followRedirect();
        
        var_dump($client->getResponse()->getContent());
        
        //$this->assertTrue($client->getResponse()->getStatusCode() == '200' );

        $this->assertTrue($crawler->filter('title:contains("Memorize Scripture | Home")')->count() > 0);

        $this->assertRegExp('/Dashboard/', $client->getResponse()->getContent());

        //$this->assertTrue($crawler->filter('h2')->count() > 0);
        //$client->getResponse()->getContent()
 
        //$this->assertTrue($crawler->filter('h2:contains("Welcome! Ready to memorize Scripture? Let\'s go!")')->count() > 0);
    	//$this->assertTrue($crawler->filter('h2.post_title')->count() > 0);
    }
}
