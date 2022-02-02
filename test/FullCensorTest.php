<?php

declare(strict_types=1);

use khumam\censorit\Censorit;
use PHPUnit\Framework\TestCase;

/**
 * FullCensorTest
 */
final class FullCensorTest extends TestCase
{    
    /**
     * testFullCensorString
     *
     * @return void
     */
    public function testFullCensorString()
    {
        $string = 'Hello World';
        $censored = Censorit::censor($string)->full();
        $expect = '***********';

        $this->assertIsString($censored);
        $this->assertEquals($censored, $expect);
    }
    
    /**
     * testFullCensoringWithoutSpace
     *
     * @return void
     */
    public function testFullCensoringWithoutSpace()
    {
        $string = 'Hello World';
        $censored = Censorit::censor($string)->full(false);
        $expect = '***** *****';

        $this->assertIsString($censored);
        $this->assertEquals($censored, $expect);
    }
}
