<?php

namespace kepka4242\LaravelMapper\Mapper;

/**
 * Interface MapperInterface
 * @package kepka4242\LaravelMapper\Mapper
 */
interface MapperInterface
{
    /**
     * @param $object
     * @param array $params
     * @return mixed
     */
    public function map($object, $params = []);

    /**
     * @param string $sourceType
     * @param string $destinationType
     * @return bool
     */
    public function isCanMap(string $sourceType, string $destinationType): bool;
}
