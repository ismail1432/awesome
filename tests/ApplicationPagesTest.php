<?php

/**
 * Created by PhpStorm.
 * User: contact@smaine.me
 * Date: 02/12/2017
 * Time: 22:23
 */
namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApplicationPagesTest extends WebTestCase
{
    public function testPageIsSuccessful()
    {

        $client = static::createClient();
        $crawler = $client->request('GET', '/post/hello-world');
        $this->assertEquals(200, $client->getResponse()->getStatusCode());

    }

}