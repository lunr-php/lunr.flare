<?php

/**
 * This file contains the test class for the registry.
 *
 * SPDX-FileCopyrightText: Copyright 2025 Framna Netherlands B.V., Zwolle, The Netherlands
 * SPDX-License-Identifier: MIT
 */

namespace Lunr\Flare\Tests;

use Lunr\Flare\Rule\Validate\Blank;
use Lunr\Flare\Rule\Validate\TypeNull;

/**
 * Test class for the registry.
 *
 * @covers Lunr\Flare\Registry
 */
class RegistryValidateFactoriesTest extends RegistryTestCase
{

    /**
     * Unit test data provider for validators.
     *
     * @return array Set of validators
     */
    public static function validateDataProvider(): array
    {
        $data          = [];
        $data['null']  = [ 'null', TypeNull::class ];
        $data['blank'] = [ 'blank', Blank::class ];

        return $data;
    }

    /**
     * Test that validators return the correct objects.
     *
     * @param string       $name  Name of the validator
     * @param class-string $class Class name of the validator
     *
     * @dataProvider validateDataProvider
     * @covers       Lunr\Flare\Registry::validate_factories
     */
    public function testValidateFactories(string $name, string $class): void
    {
        $validators = $this->class::validate_factories();

        $this->assertArrayHasKey($name, $validators);

        $instance = $validators[$name]();

        $this->assertInstanceOf($class, $instance);
    }

}

?>
