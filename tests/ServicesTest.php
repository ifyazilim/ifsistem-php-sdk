<?php

class ServicesTest extends PHPUnit_Framework_TestCase
{
    public function testTurler()
    {
        $client = new \SistemApi\ApiClient('');

        $sayfa = $client->sayfa->getDetayByKodu('tarihce');

        $this->assertEquals('Tarihçe', $sayfa->getBaslik());
    }
}