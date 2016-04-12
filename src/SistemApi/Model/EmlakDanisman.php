<?php namespace SistemApi\Model;

use Carbon\Carbon;

class EmlakDanisman
{
    public $id;
    public $adi;
    public $unvan;
    public $hakkinda;
    public $mail;
    public $telefon_cep;
    public $telefon_sabit;
    public $is_aktif;

    /**
     * @var Carbon
     */
    public $created_at;

    /**
     * @var Carbon
     */
    public $updated_at;

    // diğer alanlar

    public $resim_adresi;

    /**
     * @param \stdClass $item
     */
    public function __construct($item)
    {
        if (isset($item->id)) $this->id = $item->id;
        if (isset($item->adi)) $this->adi = $item->adi;
        if (isset($item->unvan)) $this->unvan = $item->unvan;
        if (isset($item->hakkinda)) $this->hakkinda = $item->hakkinda;
        if (isset($item->mail)) $this->mail = $item->mail;
        if (isset($item->telefon_cep)) $this->telefon_cep = $item->telefon_cep;
        if (isset($item->telefon_sabit)) $this->telefon_sabit = $item->telefon_sabit;
        if (isset($item->is_aktif)) $this->is_aktif = $item->is_aktif;
        if (isset($item->created_at)) $this->created_at = Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at);
        if (isset($item->updated_at)) $this->updated_at = Carbon::createFromFormat('Y-m-d H:i:s', $item->updated_at);

        // diğer alanlar

        if (isset($item->resim_adresi)) $this->resim_adresi = $item->resim_adresi;
    }
}