<?php

/**
 * This file contains the test class for the registry.
 *
 * SPDX-FileCopyrightText: Copyright 2025 Framna Netherlands B.V., Zwolle, The Netherlands
 * SPDX-License-Identifier: MIT
 */

namespace Lunr\Flare\Tests;

/**
 * Test class for the registry.
 *
 * @covers Lunr\Flare\Registry
 */
class RegistrySanitizeFactoriesTest extends RegistryTestCase
{

    /**
     * Test that sanitizers return the correct objects.
     *
     * @covers Lunr\Flare\Registry::sanitize_factories
     */
    public function testSanitizeFactories(): void
    {
        $sanitizers = $this->class::sanitize_factories();

        $this->assertArrayEmpty($sanitizers);
    }

}

?>
