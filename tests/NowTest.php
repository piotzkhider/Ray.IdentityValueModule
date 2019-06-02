<?php
/**
 * This file is part of the Ray.IdentityValueModule
 *
 * @license http://opensource.org/licenses/MIT MIT
 */
namespace Ray\IdentityValueModule;

use PHPUnit\Framework\TestCase;
use Ray\Di\Injector;

class NowTest extends TestCase
{
    /**
     * @var NowInterface
     */
    protected $now;

    protected function setUp()
    {
        $this->now = (new Injector(new IdentityValueModule()))->getInstance(NowInterface::class);
    }

    public function testMySqlDateFormat()
    {
        $nowString = (string) $this->now;
        $this->assertSame((new \DateTime($nowString))->format('Y-m-d H:i:s'), $nowString);
    }
}
