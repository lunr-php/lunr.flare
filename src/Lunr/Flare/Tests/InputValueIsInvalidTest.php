<?php

/**
 * This file contains the InputValueIsInvalidTest class.
 *
 * SPDX-FileCopyrightText: Copyright 2025 Framna Netherlands B.V., Zwolle, The Netherlands
 * SPDX-License-Identifier: MIT
 */

namespace Lunr\Flare\Tests;

use Lunr\Corona\Exceptions\BadRequestException;

/**
 * This class contains tests for the InputValue class.
 *
 * @covers Lunr\Flare\InputValue
 */
class InputValueIsInvalidTest extends InputValueTestCase
{

    /**
     * Test that isInvalid() throws an exception without trying to set an array report.
     *
     * @covers Lunr\Flare\InputValue::isInvalid
     */
    public function testIsInvalidThrowsExceptionWithoutArrayReport(): void
    {
        $this->expectException(BadRequestException::class);
        $this->expectExceptionMessage('Key1 did not validate as "null"!');

        try
        {
            $this->class->isInvalid('Key1 did not validate as "null"!', failures: NULL);
        }
        catch (BadRequestException $e)
        {
            $this->assertFalse($e->isReportAvailable());

            throw $e;
        }
    }

    /**
     * Test that isInvalid() throws an exception with an array report.
     *
     * @covers Lunr\Flare\InputValue::isInvalid
     */
    public function testIsInvalidThrowsExceptionWithArrayReport(): void
    {
        $errors = [
            'key1' => [
                'not null',
            ],
        ];

        $this->expectException(BadRequestException::class);
        $this->expectExceptionMessage('Key1 did not validate as "null"!');

        try
        {
            $this->class->isInvalid('Key1 did not validate as "null"!', failures: $errors);
        }
        catch (BadRequestException $e)
        {
            $this->assertTrue($e->isReportAvailable());
            $this->assertEquals("key1: not null\n", $e->getReport());

            throw $e;
        }
    }

}

?>
