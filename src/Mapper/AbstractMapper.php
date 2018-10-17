<?php

namespace kepka42\LaravelMapper\Mapper;

use kepka42\LaravelMapper\Contracts\MapperContract;
use kepka42\LaravelMapper\Exceptions\UnspecifiedDestinationTypeException;
use kepka42\LaravelMapper\Exceptions\UnspecifiedSourceTypeException;

/**
 * Class AbstractMapper
 * @package kepka4242\LaravelMapper\Mapper
 */
abstract class AbstractMapper implements MapperInterface
{
    /** @var string */
    protected $sourceType;

    /** @var string */
    protected $hintType;

    /** @var MapperContract */
    protected $mapperContract;

    /**
     * @inheritdoc
     * @throws UnspecifiedDestinationTypeException
     * @throws UnspecifiedSourceTypeException
     */
    public function isSupports(string $sourceType, string $hintType): bool
    {
        if (!$this->sourceType) {
            throw new UnspecifiedSourceTypeException();
        }

        if (!$this->hintType) {
            throw new UnspecifiedDestinationTypeException();
        }

        return $this->sourceType === $sourceType && $this->hintType = $hintType;
    }

    /** @inheritdoc */
    public function setMapperContract(MapperContract $mapperContract)
    {
        $this->mapperContract = $mapperContract;
    }
}
