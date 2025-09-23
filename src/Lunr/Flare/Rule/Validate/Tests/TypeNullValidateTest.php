<?php

/**
 * This file contains the test class for a validation rule.
 *
 * SPDX-FileCopyrightText: Copyright 2025 Framna Netherlands B.V., Zwolle, The Netherlands
 * SPDX-License-Identifier: MIT
 */

namespace Lunr\Flare\Rule\Validate\Tests;

use stdClass;

/**
 * Test class for validating that a value is NULL.
 *
 * @covers Lunr\Flare\Rule\Validate\TypeNull
 */
class TypeNullValidateTest extends TypeNullTestCase
{

    /**
     * Unit test data provider for not NULL values.
     *
     * @return array Not NULL values
     */
    public static function notNullProvider(): array
    {
        $data   = [];
        $data[] = [ TRUE ];
        $data[] = [ FALSE ];
        $data[] = [ '' ];
        $data[] = [ new stdClass() ];
        $data[] = [ 0 ];
        $data[] = [ 0.0 ];
        $data[] = [ [] ];

        return $data;
    }

    /**
     * Test validation success.
     *
     * @covers Lunr\Flare\Rule\Validate\TypeNull::__invoke
     */
    public function testValidationSuccess(): void
    {
        $subject = new stdClass();

        $subject->field = NULL;

        $this->assertTrue(call_user_func_array($this->class, [ $subject, 'field' ]));
    }

    /**
     * Test validation failure.
     *
     * @param mixed $value Not NULL value
     *
     * @dataProvider notNullProvider
     * @covers       Lunr\Flare\Rule\Validate\TypeNull::__invoke
     */
    public function testValidationFailure($value): void
    {
        $subject = new stdClass();

        $subject->field = $value;

        $this->assertFalse(call_user_func_array($this->class, [ $subject, 'field' ]));
    }

}

?>
