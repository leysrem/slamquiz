<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Cookie;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class QuestionControllerTest extends WebTestCase
{
    private function logIn($userName,$userRole) {

        $session = $this->client->getContainer()->get('session');

        $firewallName = 'main';
 
        $firewallContext = 'main';

        $token = new UsernamePasswordToken('user', null, $firewallName, [$userRole]);
        $session->set('_security_'.$firewallContext, serialize($token));
        $session->save();

        $cookie = new Cookie($session->getName(), $session->getId());
        $this->client->getCookieJar()->set($cookie);
    }

    private $client = null;

    public function setUp()
    {
        $this->client = static::createClient();
    }

    public function testSecuredRoleUser() {

        $this->logIn('user', 'ROLE_USER');
        
        
        // Asserts that /question path exists and don't return an error
        $crawler = $this->client->request('GET', '/question/');
        /* 
        Ecrire ici le code pour vérifier que, si l'utilisateur est connecté avec le rôle ROLE_USER, 
        la requête '/category' renvoie une réponse HTTP avec un code de statut égale à 200 (Response::HTTP_OK)
        */
        $this->assertSame(Response::HTTP_FORBIDDEN, $this->client->getResponse()->getStatusCode());
      
        /* 
        Ecrire ici le code pour vérifier que, si l'utilisateur est connecté avec le rôle ROLE_USER, 
        la requête '/category' renvoie 'Category index' dans la balise 'h1'
        */

        // Asserts that /category/new path exists and don't return an error
        $crawler = $this->client->request('GET', '/question/2/new');
        /* 
        Ecrire ici le code pour vérifier que, si l'utilisateur est connecté avec le rôle ROLE_USER, 
        la requête '/category/new' affiche que l'accès est interdit
        c'est à dire affirmer que le code de statut de la réponse est égale à 403 (Response::HTTP_FORBIDDEN)
        */
        $this->assertSame(Response::HTTP_FORBIDDEN, $this->client->getResponse()->getStatusCode());
    }

    public function testSecuredRoleAdmin()
    {
        $this->logIn('admin', 'ROLE_ADMIN');
        
        // Asserts that /category/new path exists and don't return an error
        $crawler = $this->client->request('GET', '/question/2/new');
        /* 
        Ecrire ici le code pour vérifier que, si l'utilisateur est connecté avec le rôle ROLE_ADMIN, 
        la requête '/category/new' renvoie une réponse HTTP avec un code de statut égale à 200 (Response::HTTP_OK)
        */
        $this->assertSame(Response::HTTP_OK, $this->client->getResponse()->getStatusCode());
        
        // Asserts that the response content contains 'Create new question' in 'h1' tag
        $this->assertSelectorTextContains('html title', 'New Question');
        /* 
        Ecrire ici le code pour vérifier que, si l'utilisateur est connecté avec le rôle ROLE_ADMIN, 
        la requête '/category/new' renvoie 'Create new category' dans la balise 'h1'
        */
        $this->assertSame(Response::HTTP_OK, $this->client->getResponse()->getStatusCode());
    } 
    
}
