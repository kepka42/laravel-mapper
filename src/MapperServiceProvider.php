<?php

namespace kepka4242\LaravelMapper;

use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use kepka4242\LaravelMapper\Contracts\MapperContract;
use kepka4242\LaravelMapper\Mapper\MapperInterface;

/**
 * Class MapperServiceProvider
 * @package kepka4242\LaravelMapper
 */
class MapperServiceProvider extends ServiceProvider
{
    /**
     * Register the Mapper Service
     */
    public function register()
    {
        $this->app->tag(config('mappers'), ['mappers']);

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
