<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityControllerTest extends WebTestCase
{
    private $client = null;

    public function setUp()
    {
        $this->client = static::createClient();
    }

    /**
     * Login form show username, password and submit button
     */
    public function testShowLogin()
    {
        // Request /login 
        $crawler = $this->client->request('GET', '/login');

        // Asserts that /login path exists and don't return an error
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
       
        
        // Asserts that the phrase "Log in!" is present in the page's title
        $this->assertSelectorTextContains('html title', 'Log in!');

        // Asserts that the response content contains 'csrf token'
        $this->assertContains('type="hidden" name="_csrf_token"',
        $this->client->getResponse()->getContent());

        
        // Asserts that the response content contains 'input type="text" id="inputEmail"'
        $this->assertContains('<input type="email" value="" name="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>',
        $this->client->getResponse()->getContent());
        
        // Asserts that the response content contains 'input type="text" id="inputPassword"'
        $this->assertContains('<input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>',
        $this->client->getResponse()->getContent());
        
    }
}
