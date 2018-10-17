<?php

namespace kepka4242\LaravelMapper;

use kepka4242\LaravelMapper\Contracts\MapperContract;

/**
 * Class MapperService
 * @package kepka4242\LaravelMapper
 */
final class MapperService implements MapperContract
{
    /** @var iterable */
    private $mappers;

    /** @inheritdoc */
    public function map($object, string $hint, $params = [])
    {
        // TODO: Implement map() method.
    }

    /** @inheritdoc */
    public function setMappers(iterable $mappers)
    {
        $this->mappers = $mappers;
    }
}
