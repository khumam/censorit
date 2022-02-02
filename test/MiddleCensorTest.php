<?php

declare(strict_types=1);

use khumam\censorit\Censorit;
use PHPUnit\Framework\TestCase;

/**
 * HalfCensorTest
 */
final class MiddleCensorTest extends TestCase
{    
    /**
     * testDefaultMiddleCensorTest
     *
     * @return void
     */
    public function testDefaultMiddleCensorTest()
    {
        $string = 'Hello World';
        $censored = Censorit::censor($string)->middle();
        $expect = 'He*** ***ld';

        $this->assertIsString($censored);
        $this->assertEquals($censored, $expect);
    }
    
    /**
     * testCustomOffsetMiddleCensorTest
     *
     * @return void
     */
    public function testCustomOffsetMiddleCensorTest()
    {
        $string = 'Hello World';
        $censored = Censorit::censor($string)->middle(3);
        $expect = 'Hel** **rld';

        $this->assertIsString($censored);
        $this->assertEquals($censored, $expect);
    }
    
    /**
     * testReverseMiddleCensorTest
     *
     * @return void
     */
    public function testReverseMiddleCensorTest()
    {
        $string = 'Hello World';
        $censored = Censorit::censor($string)->middle(2, true);
        $expect = '**llo Wor**';

        $this->assertIsString($censored);
        $this->assertEquals($censored, $expect);
    }
    
    /**
     * testReverseWithCustomOffsetMiddleCensorTest
     *
     * @return void
     */
    public function testReverseWithCustomOffsetMiddleCensorTest()
    {
        $string = 'Hello World';
        $censored = Censorit::censor($string)->middle(3, true);
        $expect = '***lo Wo***';

        $this->assertIsString($censored);
        $this->assertEquals($censored, $expect);
    }
        
    /**
     * testIfOffsetHigherThanHalfStringLengthMiddleCensorTest
     *
     * @return void
     */
    public function testIfOffsetHigherThanHalfStringLengthMiddleCensorTest()
    {
        $string = 'Hello World';
        $censored = Censorit::censor($string)->middle(7);
        $expect = '***** *****';

        $this->assertIsString($censored);
        $this->assertEquals($censored, $expect);
    }
}
