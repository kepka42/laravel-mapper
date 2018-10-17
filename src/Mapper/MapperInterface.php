<?php

namespace kepka4242\LaravelMapper\Mapper;

use kepka4242\LaravelMapper\Contracts\MapperContract;

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
     * @param string $hintType
     * @return bool
     */
    public function isCanMap(string $sourceType, string $hintType): bool;

    /**
     * @param MapperContract $mapperContract
     * @return void
     */
    public function setMapperContract(MapperContract $mapperContract);
}
