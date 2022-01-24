<?php

declare(strict_types=1);

use khumam\censorit\Censorit;
use PHPUnit\Framework\TestCase;

final class FullCensorTest extends TestCase
{
    public function testFullCensorString()
    {
        $string = 'Hello World';
        $censorit = new Censorit();
        $censored = $censorit->censor($string)->full();
        $expect = '***********';

        $this->assertIsString($censored);
        $this->assertEquals($censored, $expect);
    }

    public function testFullCensoringWithoutSpace()
    {
        $string = 'Hello World';
        $censorit = new Censorit();
        $censored = $censorit->censor($string)->full(false);
        $expect = '***** *****';

        $this->assertIsString($censored);
        $this->assertEquals($censored, $expect);
    }
}
