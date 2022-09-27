<?php

namespace MercadoPago\PP\Sdk\Tests;

use MercadoPago\PP\Sdk\Common\Config;
use MercadoPago\PP\Sdk\HttpClient\HttpClientInterface;
use MercadoPago\PP\Sdk\HttpClient\Requester\RequesterInterface;
use MercadoPago\PP\Sdk\Sdk;

/**
 * Class SdkTest
 *
 * @package MercadoPago\PP\Sdk\Tests\Sdk
 */
class SdkTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Sdk
     */
    private $sdk;

    /**
     * @var MockObject
     */
    protected $configMock;

    /**
     * @var MockObject
     */
    protected $requesterMock;

    /**
     * @var MockObject
     */
    protected $clientMock;

    /**
     * @var MockObject
     */
    protected $managerMock;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        $this->configMock = $this->getMockBuilder(Config::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->requesterMock = $this->getMockBuilder(RequesterInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->clientMock = $this->getMockBuilder(HttpClientInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->managerMock = $this->getMockBuilder(Manager::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->sdk = new Sdk('access_token', 'platform_id', 'product_id', 'integrator_id');
    }

    function testGetPreferenceSuccess()
    {
        $actual = $this->sdk->getPreferenceInstance();

        $this->assertInstanceOf('MercadoPago\PP\Sdk\Entity\Preference\Preference', $actual);
    }

    function testGetNotificationSuccess()
    {
        $actual = $this->sdk->getNotificationInstance();

        $this->assertInstanceOf('MercadoPago\PP\Sdk\Entity\Notification\Notification', $actual);
    }

    function testGetPaymentSuccess()
    {
        $actual = $this->sdk->getPaymentInstance();

        $this->assertInstanceOf('MercadoPago\PP\Sdk\Entity\Payment\Payment', $actual);
    }
}