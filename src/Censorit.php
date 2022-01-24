<?php

namespace khumam\censorit;

class Censorit
{
    protected $string;
    protected $type;

    protected const FULL = 'FULL';
    protected const HALF = 'HALF';
    protected const FIRST = 'FIRST';
    protected const LAST = 'LAST';

    public function __construct()
    {
            $this->type = self::FULL;
    }

    public function censor(string $string)
    {
        $this->string = $string;
        return $this;
    }

    public function full(bool $withSpace = true)
    {
        return CensoritCore::fullCensor($this->string, $withSpace);
    }

    public function half(int $offset = 2)
    {
        $this->type = self::HALF;
        return CensoritCore::halfCensor($this->string, $offset);
    }
}
