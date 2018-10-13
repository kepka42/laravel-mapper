<?php

namespace kepka4242\LaravelMapper;

/**
 * Interface MapperServiceInterface
 * @package kepka4242\LaravelMapper
 */
interface MapperServiceInterface
{
    /**
     * @param $object
     * @param string $destinationType
     * @param array $params
     * @return mixed
     */
    public function map($object, string $destinationType, $params = []);

    /**
     * @param iterable $mappers
     * @return mixed
     */
    public function setMappers(iterable $mappers);
}
