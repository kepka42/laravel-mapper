<?php

namespace kepka4242\LaravelMapper;

/**
 * Interface MapperContract
 * @package kepka4242\LaravelMapper
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
