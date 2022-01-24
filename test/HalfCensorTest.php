<?php

declare(strict_types=1);

use khumam\censorit\Censorit;
use PHPUnit\Framework\TestCase;

final class HalfCensorTest extends TestCase
{
    public function testHalfCensoring()
    {
        $string = 'Hello World';
        $censorit = new Censorit();
        $censored = $censorit->censor($string)->half(5);
        $expect = 'Hello *****';

        $this->assertIsString($censored);
        $this->assertEquals($censored, $expect);
    }

    public function testHalfCensoringFromEndOfString()
    {
        $string = 'Hello World';
        $censorit = new Censorit();
        $censored = $censorit->censor($string)->half(-5);
        $expect = '***** World';

        $this->assertIsString($censored);
        $this->assertEquals($censored, $expect);
    }

    public function testHalfCensoringWhenOffsetGreatherThanLengthOfString()
    {
        $string = 'Hello World';
        $censorit = new Censorit();
        $censored = $censorit->censor($string)->half(strlen($string) + 1);

        $this->assertIsString($censored);
        $this->assertEquals($censored, $string);
    }
}
