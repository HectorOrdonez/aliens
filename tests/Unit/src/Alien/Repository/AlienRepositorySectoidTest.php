<?php

namespace Tests\Unit;

use Tests\TestCase;
use XCom\Alien\Entity\Alien;
use XCom\Alien\Entity\AlienCollection;
use XCom\Alien\Entity\AlienRepositoryInterface;
use XCom\Alien\Repository\AlienRepository;

class AlienRepositorySectoidTest extends TestCase
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

    public function testCreateSectoid_ReturnsAlien_WithSectoidType()
    {
        $alienMock = $this->getAlienMock();
        $alienMock->shouldReceive('getType')->andReturn(Alien::TYPE_SECTOID);

        $alienQueryMock = $this->getAlienMock();
        $alienQueryMock
            ->shouldReceive('create')
            ->with(['type' => Alien::TYPE_SECTOID])
            ->andReturn($alienMock);

        $this->alienRepository = new AlienRepository($alienQueryMock);
        $alien = $this->alienRepository->createSectoid();

        $this->assertInstanceOf(Alien::class, $alien);
        $this->assertEquals(Alien::TYPE_SECTOID, $alien->getType());
    }
}
