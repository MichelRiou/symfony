<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class GuestControllerTest extends WebTestCase
{
    public function testArticle()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/article-list');
    }

}
