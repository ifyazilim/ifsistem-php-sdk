<?php

class ServicesTest extends PHPUnit_Framework_TestCase
{
    public function testTurler()
    {
        $client = new \SistemApi\ApiClient('X-IFSISTEM-TOKEN');

        $siteAyar = $client->site->getAyar();

         \Symfony\Component\VarDumper\VarDumper::dump($siteAyar);
    }
}