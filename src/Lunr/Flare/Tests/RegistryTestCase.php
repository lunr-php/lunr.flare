<?php

/**
 * This file contains the test class for the registry.
 *
 * SPDX-FileCopyrightText: Copyright 2025 Framna Netherlands B.V., Zwolle, The Netherlands
 * SPDX-License-Identifier: MIT
 */

namespace Lunr\Flare\Tests;

use Lunr\Flare\Registry;
use Lunr\Halo\LunrBaseTestCase;

/**
 * Test class for the registry.
 *
 * @covers Lunr\Flare\Registry
 */
abstract class RegistryTestCase extends LunrBaseTestCase
{

    /**
     * Instance of the tested class.
     * @var Registry
     */
    protected Registry $class;

    /**
     * TestCase Constructor.
     */
    public function setUp(): void
    {
        $this->class = new Registry();

        parent::baseSetUp($this->class);
    }

    /**
     * TestCase Destructor.
     */
    public function tearDown(): void
    {
        parent::tearDown();

        unset($this->class);
    }

}

?>
