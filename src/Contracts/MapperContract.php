<?php

namespace kepka42\LaravelMapper\Contracts;

/**
 * Interface MapperContract
 * @package kepka42\LaravelMapper\Contracts
 */
interface MapperContract
{
    /**
     * @param $object
     * @param string $hint
     * @param array $params
     * @return mixed
     */
    public function map($object, string $hint, $params = []);

    /**
     * @param iterable $mappers
     * @return mixed
     */
    public function setMappers(iterable $mappers);
}
