<?php

namespace Tests\Unit;

use Tests\TestCase;
use XCom\Alien\Entity\Alien;
use XCom\Alien\Entity\AlienCollection;
use XCom\Alien\Entity\AlienRepositoryInterface;
use XCom\Alien\Repository\AlienRepository;

class AlienRepositoryFloaterTest extends TestCase
{
    /**
     * @var AlienRepository
     */
    private $alienRepository;

    public function setUp()
    {
        parent::setUp();

        $this->alienRepository = new AlienRepository($this->getAlienMock());
    }

    public function tearDown()
    {
        parent::tearDown();

        \Mockery::close();
    }
    /**
     * @return \Mockery\MockInterface|Alien
     */
    private function getAlienMock()
    {
        return \Mockery::mock(Alien::class);
    }

    public function testCreateFloater_ReturnsAlien_WithFloaterType()
    {
        $alienMock = $this->getAlienMock();
        $alienMock->shouldReceive('getType')->andReturn(Alien::TYPE_FLOATER);

        $alienQueryMock = $this->getAlienMock();
        $alienQueryMock
            ->shouldReceive('create')
            ->with(['type' => Alien::TYPE_FLOATER])
            ->andReturn($alienMock);

        $this->alienRepository = new AlienRepository($alienQueryMock);
        $alien = $this->alienRepository->createFloater();

        $this->assertInstanceOf(Alien::class, $alien);
        $this->assertEquals(Alien::TYPE_FLOATER, $alien->getType());
    }
}
