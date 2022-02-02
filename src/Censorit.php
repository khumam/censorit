<?php

namespace khumam\censorit;

class Censorit
{
    protected $string;
    
    /**
     * __construct
     *
     * @param  mixed $string
     * @return void
     */
    public function __construct($string)
    {
        $this->string = $string;
    }
    
    /**
     * censor
     *
     * @param  mixed $string
     * @return Censorit
     */
    public static function censor(string $string)
    {
        $censorit = new Censorit($string);
        return $censorit;
    }
    
    /**
     * full
     *
     * @param  mixed $withSpace
     * @return void
     */
    public function full(bool $withSpace = true)
    {
        return CensoritCore::fullCensor($this->string, $withSpace);
    }
    
    /**
     * half
     *
     * @param  mixed $offset
     * @return void
     */
    public function half(int $offset = 2)
    {
        return CensoritCore::halfCensor($this->string, $offset);
    }
    
    /**
     * middle
     *
     * @param  mixed $offset
     * @return void
     */
    public function middle(int $offset = 2, bool $reverse = false)
    {
        return CensoritCore::middleCensor($this->string, $offset, $reverse);
    }
}
