<?php

namespace Heidelpay\Tests\PhpApi\Unit\Adapter;

use Heidelpay\PhpApi\Response;
use PHPUnit\Framework\TestCase;
use Heidelpay\PhpApi\Adapter\CurlAdapter;

/**
 * Unit test for the curl adapter
 *
 * This unit test will cover an error in the connection and an simple post
 * request to the sandbox payment system. Please note stat connection
 * test can false due to network issues and scheduled down times.
 *
 * @license Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 * @copyright Copyright © 2016-present Heidelberger Payment GmbH. All rights reserved.
 *
 * @link  http://dev.heidelpay.com/heidelpay-php-api/
 *
 * @author  Jens Richter
 *
 * @category unittest
 */
class CurlAdapterTest extends TestCase
{
    /**
     * This test will cover the error handling of the curl adapter
     *
     * @group connectionTest
     */
    public function testHostNotFound()
    {
        $curlAdapter = new CurlAdapter();

        /** @var array $result_array */
        /** @var Response $response */
        list($result_array, $response) = $curlAdapter->sendPost('https://abc.heidelpay.de/');

        $this->assertTrue(is_array($result_array), 'First result key should be an array.');
        $this->assertTrue(is_object($response), 'Second result key should be an object.');
        $expected = array(
            'PROCESSING_RESULT' => 'NOK',
            'PROCESSING_RETURN_CODE' => 'CON.ERR.DEF'
        );
        $this->assertEquals($expected['PROCESSING_RESULT'], $result_array['PROCESSING_RESULT']);
        $this->assertEquals($expected['PROCESSING_RETURN_CODE'], $result_array['PROCESSING_RETURN_CODE']);

        $this->assertTrue($response->isError(), 'isError should return true');
        $this->assertFalse($response->isSuccess(), 'isSuccess should return false');

        $error = $response->getError();

        $this->assertEquals($expected['PROCESSING_RETURN_CODE'], $error['code']);
    }

    /**
     * This test will send a simple request,
     *
     * @depends testHostNotFound
     * @group connectionTest
     */
    public function testSimplePost()
    {
        $curlAdapter = new CurlAdapter();

        $post = array(
            'SECURITY.SENDER' => '31HA07BC8142C5A171745D00AD63D182',
            'USER.LOGIN' => '31ha07bc8142c5a171744e5aef11ffd3',
            'USER.PWD' => '93167DE7',
            'TRANSACTION.MODE' => 'CONNECTOR_TEST',
            'TRANSACTION.CHANNEL' => '31HA07BC8142C5A171744F3D6D155865',
            'PAYMENT.CODE' => 'CC.RG',
            'FRONTEND.MODE' => 'WHITELABEL',
            'FRONTEND.ENABLED' => 'TRUE',
            'FRONTEND.LANGUAGE' => 'EN',
            'FRONTEND.RESPONSE_URL' => 'http://dev.heidelpay.de',
            'CONTACT.IP' => '127.0.0.1',
            'REQUEST.VERSION' => '1.0'
        );

        /** @var array $result_array */
        /** @var Response $response */
        list($result_array, $response) = $curlAdapter->sendPost('https://test-heidelpay.hpcgw.net/ngw/post', $post);

        $this->assertTrue(is_array($result_array), 'First result key should be an array.');
        $this->assertTrue(is_object($response), 'Second result key should be an object.');

        $this->assertFalse($response->isError(), 'isError should return false');
        $this->assertTrue($response->isSuccess(), 'isSuccess should return true');
    }
}