<?php

namespace App\Tests\Controller;

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;

class ArticleTest extends TestCase {
    private $_client;
    
    public function testArticlesEndpoint(): void {

        
        $response = $this->_client->get('articles');
        
        // Ensure a 200 Http status code after a GET
        $this->assertEquals(200, $response->getStatusCode());
        
        // Ensure got Welcome to latte and code as content of response
        $expectedResponseBody = 'Welcome to Latte and Code';
        $this->assertEquals($expectedResponseBody, (string) $response->getBody());
    }
    
    
    protected function setUp(): void {
        $this->_client = new Client([
            'base_uri' => 'http://host.docker.internal/',
            'defaults' => [
                'exceptions' => false
            ]
        ]);
    }
}
