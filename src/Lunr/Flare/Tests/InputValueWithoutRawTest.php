<?php

/**
 * This file contains the InputValueWithoutRawTest class.
 *
 * SPDX-FileCopyrightText: Copyright 2025 Framna Netherlands B.V., Zwolle, The Netherlands
 * SPDX-License-Identifier: MIT
 */

namespace Lunr\Flare\Tests;

/**
 * This class contains tests for the InputValue class.
 *
 * @covers Lunr\Flare\InputValue
 */
class InputValueWithoutRawTest extends InputValueTestCase
{

    /**
     * Test that the name was passed correctly.
     */
    public function testNamePassedCorrectly(): void
    {
        $this->assertPropertySame('name', 'key1');
    }

    /**
     * Test that the value was passed correctly.
     */
    public function testValuePassedCorrectly(): void
    {
        $this->assertPropertySame('value', 'value1');
    }

    /**
     * Test that the raw value is set to the value.
     */
    public function testRawValueSetCorrectly(): void
    {
        $this->assertPropertySame('rawValue', 'value1');
    }

}

?>
