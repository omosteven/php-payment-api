<?php

namespace Heidelpay\Tests\PhpApi\Unit\ParameterGroup;

use PHPUnit\Framework\TestCase;
use Heidelpay\PhpApi\ParameterGroups\ContactParameterGroup as Contact;

/**
 * Unit test for ContactParameterGroup
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
class ContactParameterGroupTest extends TestCase
{
    /**
     * Email getter/setter test
     */
    public function testEmail()
    {
        $Contact = new Contact();

        $email = 'development@heidelpay.de';
        $Contact->setEmail($email);

        $this->assertEquals($email, $Contact->getEmail());
    }

    /**
     * IP setter/getter test
     */
    public function testIp()
    {
        $Contact = new Contact();

        $ip = '127.0.0.1';
        $Contact->setIp($ip);

        $this->assertEquals($ip, $Contact->getIp());
    }

    /**
     * Mobile setter/getter test
     *
     * @test
     */
    public function mobile()
    {
        $Contact = new Contact();

        $value = '+49 555 22 1340';
        $Contact->setMobile($value);

        $this->assertEquals($value, $Contact->getMobile());
    }

    /**
     * Phone setter/getter test
     *
     * @test
     */
    public function phone()
    {
        $Contact = new Contact();

        $value = '+49 6221 64 71 400';
        $Contact->setPhone($value);

        $this->assertEquals($value, $Contact->getPhone());
    }
}