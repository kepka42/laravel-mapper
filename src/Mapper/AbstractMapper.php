<?php

namespace kepka4242\LaravelMapper\Mapper;

use kepka4242\LaravelMapper\Contracts\MapperContract;
use kepka4242\LaravelMapper\Exceptions\UnspecifiedDestinationTypeException;
use kepka4242\LaravelMapper\Exceptions\UnspecifiedSourceTypeException;

/**
 * Class AbstractMapper
 * @package kepka4242\LaravelMapper\Mapper
 */
abstract class AbstractMapper implements MapperInterface
{
    /** @var string */
    protected $sourceType;

    /** @var string */
    protected $destinationType;

    /** @var MapperContract */
    protected $mapperContract;

    /**
     * @inheritdoc
     * @throws UnspecifiedDestinationTypeException
     * @throws UnspecifiedSourceTypeException
     */
    public function isSupports(string $sourceType, string $destinationType): bool
    {
        if (!$this->sourceType) {
            throw new UnspecifiedSourceTypeException();
        }

        if (!$this->destinationType) {
            throw new UnspecifiedDestinationTypeException();
        }

        return $this->sourceType === $sourceType && $this->destinationType = $destinationType;
    }

    /** @inheritdoc */
    public function setMapperContract(MapperContract $mapperContract)
    {
        $this->mapperContract = $mapperContract;
    }
}
