<?php

namespace Tests\Unit;

use App\Alien;
use Tests\TestCase;

class AlienTest extends TestCase
{
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
        $response = $alien->save();

        $this->assertTrue($response);
        $this->assertDatabaseHas('aliens', ['id' => $alien->id]);
    }

    public function testByeAyy()
    {
        $alien = new Alien();
        $alien->save();

        $id = $alien->id;

        $alien->delete();

        $this->assertDatabaseMissing('aliens', ['id' => $id]);
    }
}
