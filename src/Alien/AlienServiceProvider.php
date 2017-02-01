<?php
namespace XCom\Alien;

use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use XCom\Alien\Entity\Alien;
use XCom\Alien\Repository\AlienRepository;

class AlienServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(Alien::class, function () {
            return new Alien();
        });

        $this->app->bind(AlienRepositoryInterface::class, function (Application $app) {
            return new AlienRepository($app->make(Alien::class));
        });
    }

}
