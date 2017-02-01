<?php
namespace XCom\Pod;

use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use XCom\Pod\Entity\Pod;
use XCom\Pod\Repository\PodRepository;

class PodServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(Pod::class, function () {
            return new Pod();
        });

        $this->app->bind(PodRepositoryInterface::class, function (Application $app) {
            return new PodRepository($app->make(Pod::class));
        });
    }

}
