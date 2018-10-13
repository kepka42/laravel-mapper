<?php

namespace kepka4242\LaravelMapper;

use Illuminate\Support\Collection;

/**
 * Class MapperService
 * @package kepka4242\LaravelMapper
 */
final class MapperService implements MapperServiceInterface
{
    /** @var Collection */
    private $mappers;

    /**
     * MapperService constructor.
     * @param Collection $mappers
     */
    public function __construct(Collection $mappers)
    {
        $this->mappers = $mappers;
    }

    /** @inheritdoc */
    public function map($object, string $destinationType, $params = [])
    {
        // TODO: Implement map() method.
    }
}
