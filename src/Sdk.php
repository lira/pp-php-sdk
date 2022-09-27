<?php

namespace MercadoPago\PP\Sdk;

use MercadoPago\PP\Sdk\Common\Config;
use MercadoPago\PP\Sdk\Common\Constants;
use MercadoPago\PP\Sdk\Common\Manager;
use MercadoPago\PP\Sdk\HttpClient\HttpClient;
use MercadoPago\PP\Sdk\HttpClient\Requester\CurlRequester;

/**
 * Class Sdk
 *
 * @package MercadoPago\PP\Sdk
 */
class Sdk
{
    /**
     * @var Config
     */
    private $config;

    /**
     * @var RequesterInterface
     */
    private $requester;

    /**
     * @param String $access_token
     * @param String $platform_id
     * @param String $product_id
     * @param String $integrator_id
     */
    public function __construct(
        string $access_token,
        string $platform_id,
        string $product_id,
        string $integrator_id
    ) {
        $this->requester = new CurlRequester();
        $this->config = new Config();
        $this->config->access_token = $access_token;
        $this->config->platform_id = $platform_id;
        $this->config->product_id = $product_id;
        $this->config->integrator_id = $integrator_id;
    }

    /**
     * @param string $entityName
     * @param string $baseUrl
     *
     * @return Preference
     */
    public function getEntityInstance($entityName, $baseUrl)
    {
        $client = new HttpClient($baseUrl, $this->requester);
        $manager = new Manager($client, $this->config);
        $instance = new $entityName($manager);

        return $instance;
    }

    /**
     * @return Preference
     */
    public function getPreferenceInstance()
    {
        return $this->getEntityInstance('MercadoPago\PP\Sdk\Entity\Preference\Preference', Constants::BASEURL_MP);
    }

    /**
     * @return Notification
     */
    public function getNotificationInstance()
    {
        return $this->getEntityInstance('MercadoPago\PP\Sdk\Entity\Notification\Notification', Constants::BASEURL_MP);
    }

    /**
     * @return Payment
     */
    public function getPaymentInstance()
    {
        return $this->getEntityInstance('MercadoPago\PP\Sdk\Entity\Payment\Payment', Constants::BASEURL_MP);
    }
}