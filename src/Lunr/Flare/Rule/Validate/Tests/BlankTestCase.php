<?php

/**
 * This file contains the test class for a validation rule.
 *
 * SPDX-FileCopyrightText: Copyright 2025 Framna Netherlands B.V., Zwolle, The Netherlands
 * SPDX-License-Identifier: MIT
 */

namespace Lunr\Flare\Rule\Validate\Tests;

use Lunr\Flare\Rule\Validate\Blank;
use Lunr\Halo\LunrBaseTestCase;

/**
 * Test class for validating that a value is blank.
 *
 * @covers Lunr\Flare\Rule\Validate\Blank
 */
abstract class BlankTestCase extends LunrBaseTestCase
{

    /**
     * Instance of the tested class.
     * @var Blank
     */
    protected Blank $class;

    /**
     * TestCase Constructor.
     */
    public function setUp(): void
    {
        $this->class = new Blank();

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
