<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use XCom\Alien\Entity\Alien;

class AlienTest extends TestCase
{
    use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAlienInstance()
    {
        $alien = new Alien();

        $this->assertInstanceOf(Alien::class, $alien);
    }

    public function testSaveNewAlien()
    {
        $alien = new Alien();
        $alien->setType(Alien::TYPE_SECTOID);
        $response = $alien->save();

        $this->assertTrue($response);
        $this->assertDatabaseHas('aliens', ['id' => $alien->id]);
    }

    public function testByeAyy()
    {
        $alien = new Alien();
        $alien->setType(Alien::TYPE_SECTOID);
        $alien->save();

        $id = $alien->id;

        $alien->delete();

        $this->assertDatabaseMissing('aliens', ['id' => $id]);
    }
}
