<?php

namespace kepka42\LaravelMapper\Mapper;

use kepka42\LaravelMapper\Contracts\MapperContract;

/**
 * Interface MapperInterface
 * @package kepka42\LaravelMapper\Mapper
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
    public function isSupports(string $sourceType, string $hintType): bool;

    /**
     * @param MapperContract $mapperContract
     * @return void
     */
    public function setMapperContract(MapperContract $mapperContract);
}
