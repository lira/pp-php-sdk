<?php

namespace MercadoPago\PP\Sdk\Common;

/**
 * Class Config
 *
 * @package MercadoPago\PP\Sdk\Common
 */
class Config
{
    /**
     * @var string
     */
    private $access_token;

    /**
     * @var string
     */
    private $platform_id;

    /**
     * @var string
     */
    private $product_id;

    /**
     * @var string
     */
    private $integrator_id;

    /**
     * Config constructor.
     *
     * @param string|null $access_token
     * @param string|null $platform_id
     * @param string|null $product_id
     * @param string|null $integrator_id
     */
    public function __construct(
        $access_token = null,
        $platform_id = null,
        $product_id = null,
        $integrator_id = null
    ) {
        $this->access_token = $access_token;
        $this->platform_id = $platform_id;
        $this->product_id = $product_id;
        $this->integrator_id = $integrator_id;
    }

    /**
     * @param string $name
     *
     * @return mixed
     */
    public function __get($name)
    {
        return $this->{$name};
    }

    /**
     * @param string $name
     * @param string $value
     */
    public function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            $this->{$name} = $value;
        }
    }
}
