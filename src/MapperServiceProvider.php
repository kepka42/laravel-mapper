<?php

namespace kepka42\LaravelMapper;

use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use kepka42\LaravelMapper\Console\MapperMakeCommand;
use kepka42\LaravelMapper\Contracts\MapperContract;
use kepka42\LaravelMapper\Facades\Mapper;
use kepka42\LaravelMapper\Mapper\MapperInterface;

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

        if ($this->app->runningInConsole()) {
            $this->commands([
                MapperMakeCommand::class
            ]);
        }
    }

    /**
     * Register the Mapper Service
     *
     * @return void
     */
    public function register()
    {
        $this->app->tag(config('mapper.mappers'), ['mappers']);

        $this->app->singleton(MapperContract::class, function (Application $app) {
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

            // Register contract to Facade
            Mapper::setMapperContract($mapperContract);

            $mapperContract->setMappers($mappers);
            return $mapperContract;
        });
    }
}
