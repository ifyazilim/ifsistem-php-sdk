<?php namespace SistemApi\Model;

use Carbon\Carbon;
use SistemApi\Model\Urun\Ozellik;

/**
 * @deprecated use Urun\OzellikGrup
 */
class UrunOzellikGrup
{
    public $id;
    public $adi;

    /**
     * @var Carbon
     */
    public $created_at;

    /**
     * @var Carbon
     */
    public $updated_at;

    // modeller

    /**
     * @var Ozellik[]
     */
    public $ozellikler = [];

    /**
     * @param \stdClass $item
     */
    public function __construct($item = null)
    {
        if (isset($item->id)) $this->id = $item->id;
        if (isset($item->adi)) $this->adi = $item->adi;
        if (isset($item->created_at)) $this->created_at = Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at);
        if (isset($item->updated_at)) $this->updated_at = Carbon::createFromFormat('Y-m-d H:i:s', $item->updated_at);

        if (isset($item->ozellikler)) {
            foreach ($item->ozellikler as $ozellik) {
                $this->ozellikler[] = new Ozellik($ozellik);
            }
        }
    }
}