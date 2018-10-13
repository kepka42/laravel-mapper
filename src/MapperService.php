<?php

namespace kepka4242\LaravelMapper;

/**
 * Class MapperService
 * @package kepka4242\LaravelMapper
 */
final class MapperService implements MapperServiceInterface
{
    /** @var iterable */
    private $mappers;

    /** @inheritdoc */
    public function map($object, string $destinationType, $params = [])
    {
        // TODO: Implement map() method.
    }

    /** @inheritdoc */
    public function setMappers(iterable $mappers)
    {
        $this->mappers = $mappers;
    }
}
