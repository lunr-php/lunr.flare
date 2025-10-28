<?php

/**
 * This file contains the InputValueTestCase class.
 *
 * SPDX-FileCopyrightText: Copyright 2025 Framna Netherlands B.V., Zwolle, The Netherlands
 * SPDX-License-Identifier: MIT
 */

namespace Lunr\Flare\Tests;

use Lunr\Flare\InputValue;
use Lunr\Halo\LunrBaseTestCase;

/**
 * This class contains common setup routines, providers
 * and shared attributes for testing the InputValue class.
 *
 * @covers Lunr\Flare\InputValue
 */
abstract class InputValueTestCase extends LunrBaseTestCase
{

    /**
     * Instance of the tested class.
     * @var InputValue
     */
    protected InputValue $class;

    /**
     * Testcase Constructor.
     */
    public function setUp(): void
    {
        $this->class = new InputValue('key1', 'value1', raw: NULL);

        parent::baseSetUp($this->class);
    }

    /**
     * Testcase Destructor.
     */
    public function tearDown(): void
    {
        unset($this->class);

        parent::tearDown();
    }

}

?>
