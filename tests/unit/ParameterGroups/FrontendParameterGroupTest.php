<?php

namespace Heidelpay\Tests\PhpPaymentApi\Unit\ParameterGroup;

use Codeception\TestCase\Test;
use Heidelpay\PhpPaymentApi\Constants\FrontendMode;
use Heidelpay\PhpPaymentApi\ParameterGroups\FrontendParameterGroup as Frontend;

/**
 * Unit test for FrontendParameterGroup
 *
 * @license Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 * @copyright Copyright © 2016-present heidelpay GmbH. All rights reserved.
 *
 * @link  http://dev.heidelpay.com/heidelpay-php-api/
 *
 * @author  Jens Richter
 *
 * @package heidelpay\php-payment-api\tests\unit
 */
class FrontendParameterGroupTest extends Test
{
    /**
     * Enabled getter/setter test
     *
     * @test
     */
    public function enabled()
    {
        $frontend = new Frontend();

        $value = 'false';
        $frontend->setEnabled($value);

        $this->assertEquals($value, $frontend->getEnabled());
    }

    /**
     * Language getter/setter test
     *
     * @test
     */
    public function language()
    {
        $frontend = new Frontend();

        $value = 'EN';
        $frontend->setLanguage($value);

        $this->assertEquals($value, $frontend->getLanguage());
    }

    /**
     * Redirect url getter/setter test
     *
     * @test
     */
    public function redirectUrl()
    {
        $frontend = new Frontend();

        $value = 'https://dev.heidelpay.com';
        $frontend->setRedirectUrl($value);

        $this->assertEquals($value, $frontend->getRedirectUrl());
    }

    /**
     * Response url getter/setter test
     *
     * @test
     */
    public function responseUrl()
    {
        $frontend = new Frontend();

        $value = 'https://dev.heidelpay.com';
        $frontend->setResponseUrl($value);

        $this->assertEquals($value, $frontend->getResponseUrl());
    }

    /**
     * Frontend mode getter/setter test
     *
     * @test
     */
    public function modeShouldNotBeChangeable()
    {
        $frontend = new Frontend();

        $frontend->setMode('DEFAULT');
        $this->assertEquals(FrontendMode::FRONTEND_MODE_WHITELABEL, $frontend->getMode());

        $frontend->set('mode', 'OTHERMODE');
        $this->assertEquals(FrontendMode::FRONTEND_MODE_WHITELABEL, $frontend->getMode());
    }

    /**
     * Payment frame origin getter/setter test
     */
    public function testPaymentFrameOrigin()
    {
        $frontend = new Frontend();

        $value = 'https://dev.heidelpay.com';
        $frontend->setPaymentFrameOrigin($value);

        $this->assertEquals($value, $frontend->getPaymentFrameOrigin());
    }

    /**
     * Payment frame url getter/setter test
     */
    public function testPaymentFrameUrl()
    {
        $frontend = new Frontend();

        $value = 'https://dev.heidelpay.com';
        $frontend->set('payment_frame_url', $value);

        $this->assertEquals($value, $frontend->getPaymentFrameUrl());
    }

    /**
     * Payment css path getter/setter test
     */
    public function testPaymentCssPath()
    {
        $frontend = new Frontend();

        $value = 'https://dev.heidelpay.com';
        $frontend->setCssPath($value);

        $this->assertEquals($value, $frontend->getCssPath());
    }

    /**
     * Prevent async redirect getter/setter test
     */
    public function testPreventAsyncRedirect()
    {
        $frontend = new Frontend();

        $value = 'TRUE';
        $frontend->setPreventAsyncRedirect($value);

        $this->assertEquals($value, $frontend->getPreventAsyncRedirect());
    }
}
