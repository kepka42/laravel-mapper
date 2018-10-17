<?php

namespace kepka42\LaravelMapper\Facades\Classes;

use kepka42\LaravelMapper\Contracts\MapperContract;

/**
 * Class Mapper
 * @package kepka42\LaravelMapper\Facades\Classes
 */
class Mapper
{
    /** @var MapperContract */
    private $mapperContract;

    /**
     * @param MapperContract $mapperContract
     */
    public function setMapperContract(MapperContract $mapperContract)
    {
        $this->mapperContract = $mapperContract;
    }

    /**
     * @param $object
     * @param string $hint
     * @param array $params
     * @return mixed
     */
    public function map($object, string $hint, $params = [])
    {
        return $this->mapperContract->map($object, $hint, $params);
    }
}
