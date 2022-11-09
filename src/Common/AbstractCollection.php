<?php

namespace MercadoPago\PP\Sdk\Common;

/**
 * Class AbstractCollection
 *
 * @package MercadoPago\PP\Sdk\Common
 */
abstract class AbstractCollection implements \IteratorAggregate, \Countable, \JsonSerializable
{
    /**
     * @var array
     */
    public $collection = [];

    /**
     * Add entity to collection
     *
     * @param mixed $entity
     * @param string|null $key
     */
    public function add($entity, $key = null)
    {
        if (is_null($key)) {
            $this->collection[] = $entity;
        } else {
            $this->collection[$key] = $entity;
        }
    }

    /**
     * Add multiple entities to collection
     *
     * @param $entityArray
     */
    public function setEntity($entityArray)
    {
        if (is_array($entityArray) || is_object($entityArray)) {
            foreach ($entityArray as $value) {
                $this->add($value);
            }
        }
    }

    /**
     * @inheritDoc
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->collection);
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->collection);
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->collection;
    }
}
