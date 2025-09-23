<?php

/**
 * This file contains the test class for a validation rule.
 *
 * SPDX-FileCopyrightText: Copyright 2025 Framna Netherlands B.V., Zwolle, The Netherlands
 * SPDX-License-Identifier: MIT
 */

namespace Lunr\Flare\Rule\Validate\Tests;

use Lunr\Flare\Rule\Validate\TypeNull;
use Lunr\Halo\LunrBaseTestCase;

/**
 * Test class for validating that a value is NULL.
 *
 * @covers Lunr\Flare\Rule\Validate\TypeNull
 */
abstract class TypeNullTestCase extends LunrBaseTestCase
{

    /**
     * Instance of the tested class.
     * @var TypeNull
     */
    protected TypeNull $class;

    /**
     * TestCase Constructor.
     */
    public function setUp(): void
    {
        $this->class = new TypeNull();

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
