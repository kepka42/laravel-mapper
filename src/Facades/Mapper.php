<?php

namespace kepka42\LaravelMapper\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Mapper
 * @package kepka42\LaravelMapper\Facades
 */
class Mapper extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return \kepka42\LaravelMapper\Facades\Classes\Mapper::class;
    }
}
