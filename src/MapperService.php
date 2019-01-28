<?php

namespace kepka42\LaravelMapper;

use Illuminate\Support\Collection;
use kepka42\LaravelMapper\Contracts\MapperContract;
use kepka42\LaravelMapper\Exceptions\MapperNotFoundException;
use kepka42\LaravelMapper\Mapper\MapperInterface;

/**
 * Class MapperService
 * @package kepka42\LaravelMapper
 */
final class MapperService implements MapperContract
{
    /** @var iterable */
    private $mappers;

    /**
     * @inheritdoc
     * @throws MapperNotFoundException
     * @throws \ReflectionException
     */
    public function map($object, string $hint, $params = [])
    {
        // For array
        if (is_array($object)) {
            $result = [];
            foreach ($object as $item) {
                $result[] = $this->map($item, $hint, $params);
            }
            return $result;
        }

        // For Laravel Collection
        if ($object instanceof Collection) {
            /** @var Collection $result */
            $result = collect();

            foreach ($object as $item) {
                $result->push(
                    $this->map($item, $hint, $params)
                );
            }
            return $result;
        }

        $reflection = new \ReflectionClass($object);
        $classInfo = $reflection->getName();

        /** @var MapperInterface $mapper */
        foreach ($this->mappers as $mapper) {
            if ($mapper->isSupports($classInfo, $hint)) {
                return $mapper->map($object, $params);
            }
        }

        throw new MapperNotFoundException("Mapper for {$classInfo} to {$hint} not found");
    }

    /** @inheritdoc */
    public function setMappers(iterable $mappers)
    {
        $this->mappers = $mappers;
    }
}
