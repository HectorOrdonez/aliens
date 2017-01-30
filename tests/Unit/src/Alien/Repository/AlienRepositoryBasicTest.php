<?php

namespace Tests\Unit;

use Tests\TestCase;
use XCom\Alien\Entity\Alien;
use XCom\Alien\Entity\AlienCollection;
use XCom\Alien\Entity\AlienRepositoryInterface;
use XCom\Alien\Repository\AlienRepository;

class AlienRepositoryBasicTest extends TestCase
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
     * A basic test example.
     *
     * @return void
     */
    public function testAlienRepositoryInstance()
    {
        $this->assertInstanceOf(AlienRepository::class, $this->alienRepository);
        $this->assertInstanceOf(AlienRepositoryInterface::class, $this->alienRepository);
    }

    public function testFindAll_ReturnsCollection()
    {
        $alienMock = $this->getAlienMock();
        $alienMock->shouldReceive('get')->andReturn(new AlienCollection);
        $this->alienRepository = new AlienRepository($alienMock);

        $all = $this->alienRepository->findAll();

        $this->assertInstanceOf(AlienCollection::class, $all);
    }

    public function testFindAll_FindsNone_WhenEmpty()
    {
        $alienMock = $this->getAlienMock();
        $alienMock->shouldReceive('get')->andReturn(new AlienCollection);
        $this->alienRepository = new AlienRepository($alienMock);

        $all = $this->alienRepository->findAll();

        $this->assertCount(0, $all);
    }

    public function testFindById_ReturnsFalse_WhenNotExisting()
    {
        $fakeId = rand();
        $alienMock = $this->getAlienMock();
        $alienMock
            ->shouldReceive('find')
            ->with($fakeId)
            ->andReturn(false);

        $this->alienRepository = new AlienRepository($alienMock);

        $response = $this->alienRepository->findById($fakeId);

        $this->assertFalse($response);
    }

    public function testFindById_ReturnsAlien_WhenExists()
    {
        $fakeId = rand();

        $alienMock = $this->getAlienMock();
        $alienMock->shouldReceive('getId')->andReturn($fakeId);

        $alienQueryMock = $this->getAlienMock();
        $alienQueryMock
            ->shouldReceive('find')
            ->with($fakeId)
            ->andReturn($alienMock);

        $this->alienRepository = new AlienRepository($alienQueryMock);
        $response = $this->alienRepository->findById($fakeId);

        $this->assertInstanceOf(Alien::class, $response);
        $this->assertEquals($fakeId, $response->getId());
    }

    public function testDestroy_DeletesAlien_FromDB()
    {
        $alienMock = $this->getAlienMock();
        $alienMock->shouldReceive('delete')->once()->andReturn(true);

        $this->alienRepository = new AlienRepository($this->getAlienMock());
        $this->alienRepository->destroy($alienMock);
    }

    /**
     * @return \Mockery\MockInterface|Alien
     */
    private function getAlienMock()
    {
        return \Mockery::mock(Alien::class);
    }
}
