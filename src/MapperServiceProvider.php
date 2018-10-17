<?php

namespace kepka4242\LaravelMapper;

use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use kepka42\LaravelMapper\Contracts\MapperContract;
use kepka42\LaravelMapper\Mapper\MapperInterface;
use kepka42\LaravelMapper\MapperService;

/**
 * Class MapperServiceProvider
 * @package kepka42\LaravelMapper
 */
class MapperServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap mapper service
     *
     * @return void
     */
    public function boot()
    {
        // Publish config file
        $this->publishes([__DIR__ . '/../config/' => config_path() . '/']);
    }

    /**
     * Register the Mapper Service
     *
     * @return void
     */
    public function register()
    {
        $this->app->tag(config('mappers.mappers'), ['mappers']);

        $this->app->singleton(MapperContract::class, MapperService::class, function (Application $app) {
            $taggedMappers = $app->tagged('mappers');

            $mapperContract = new MapperService();

            $mappers = [];
            /** @var MapperInterface $mapper */
            foreach ($taggedMappers as $mapper) {
                if ($mapper instanceof MapperInterface) {
                    $mapper->setMapperContract($mapperContract);
                    $mappers[] = $mapper;
                }
            }

            $mapperContract->setMappers($mappers);
            return $mapperContract;
        });
    }
}
