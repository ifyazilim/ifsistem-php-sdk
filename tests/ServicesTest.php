<?php

class ServicesTest extends PHPUnit_Framework_TestCase
{
    public function testTurler()
    {
        $client = new \SistemApi\ApiClient('b56505c725e579d8cdc3ae7c0dc699aa');

        $sayfa = $client->sayfa->getDetayByKodu('tarihce');

        $this->assertEquals('Tarihçe', $sayfa->getBaslik());
    }
}