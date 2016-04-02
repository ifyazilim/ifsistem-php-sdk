<?php namespace SistemApi\Exception;

class MovedException extends \Exception
{
    /**
     * @var int|null
     */
    private $yeniId;

    /**
     * @param string $message
     * @param int $yeniId
     */
    public function __construct($message, $yeniId)
    {
        parent::__construct($message);

        $this->yeniId = $yeniId;
    }

    /**
     * @return int|null
     */
    public function getYeniId()
    {
        return $this->yeniId;
    }
}