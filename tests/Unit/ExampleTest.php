<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Domain\Checkin\Checkin;
use App\Domain\Expert\Expert;
class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    public function testCanAddExpert()
    {
        $expert = new Expert();
        $checkin = new Checkin();
        $checkin->addExpert($expert);

        $this->assertNotSame($expert, $checkin->getExpert());

    }
}
