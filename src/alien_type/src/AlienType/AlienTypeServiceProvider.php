<?php
namespace XCom\AlienType;

use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use XCom\AlienType\Entity\AlienType;
use XCom\AlienType\AlienTypeRepositoryInterface;
use XCom\AlienType\Repository\AlienTypeRepository;

class AlienTypeServiceProvider extends ServiceProvider
{
    public function boot()
    {
        require __DIR__ . '/../helper.php';
    }

    public function register()
    {
        $this->app->bind(AlienType::class, function () {
            return new AlienType();
        });

        $this->app->bind(AlienTypeRepositoryInterface::class, function (Application $app) {
            return new AlienTypeRepository($app->make(AlienType::class));
        });
    }

}
