<?php

namespace kepka42\LaravelMapper\Console;

use Illuminate\Console\GeneratorCommand;
use kepka42\LaravelMapper\Contracts\MapperContract;

/**
 * Class MapperMakeCommand
 * @package kepka42\LaravelMapper\Console
 */
class MapperMakeCommand extends GeneratorCommand
{
    protected $name = 'make:mapper';

    protected $description = 'Create a new Mapper model class';

    protected $type = MapperContract::class;

    /**
     * @return string
     */
    protected function getStub()
    {
        return __DIR__ . '/stubs/Mapper.stub';
    }

    /**
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Mappers';
    }
}
