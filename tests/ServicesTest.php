<?php

class ServicesTest extends PHPUnit_Framework_TestCase
{
    public function testTurler()
    {
        $client = new \SistemApi\ApiClient('X-IFSISTEM-TOKEN', 'http://ifsistem.app/api/v1');

        $haberler = $client->haber->liste(
            (new \SistemApi\Model\Ayar\HaberListeAyar())
                ->setOrderByYayinBaslangicZamani()
                ->setAdet(4)
        );

         \Symfony\Component\VarDumper\VarDumper::dump($haberler);
    }
}