<?php

namespace kepka4242\LaravelMapper;

use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use kepka4242\LaravelMapper\Mapper\AbstractMapper;

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

        $this->app->singleton(MapperService::class, function (Application $app) {
            $taggedMappers = $app->tagged('mappers');

            $mapperService = new MapperService();

            $mappers = [];
            foreach ($taggedMappers as $mapper) {
                if ($mapper instanceof AbstractMapper) {
                    $mappers[] = $mapper;
                }
            }

            $mapperService->setMappers($mappers);
            return $mapperService;
        });
    }
}
