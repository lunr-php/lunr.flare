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
 * Test class for validating that a value is blank.
 *
 * @covers Lunr\Flare\Rule\Validate\Blank
 */
class BlankValidateTest extends BlankTestCase
{

    /**
     * Unit test data provider for not blank values.
     *
     * @return array Not blank values
     */
    public static function notBlankProvider(): array
    {
        $data   = [];
        $data[] = [ TRUE ];
        $data[] = [ FALSE ];
        $data[] = [ 'string' ];
        $data[] = [ new stdClass() ];
        $data[] = [ 0 ];
        $data[] = [ 0.0 ];
        $data[] = [ [] ];

        return $data;
    }

    /**
     * Unit test data provider for blank values.
     *
     * @return array Blank values
     */
    public static function blankProvider(): array
    {
        $data   = [];
        $data[] = [ NULL ];
        $data[] = [ '' ];
        $data[] = [ '  ' ];

        return $data;
    }

    /**
     * Test validation success.
     *
     * @covers Lunr\Flare\Rule\Validate\Blank::__invoke
     */
    public function testValidationofUnsetValue(): void
    {
        $subject = new stdClass();

        $subject->field = 'string';

        unset($subject->field);

        $this->assertTrue(call_user_func_array($this->class, [ $subject, 'field' ]));
    }

    /**
     * Test validation success.
     *
     * @covers Lunr\Flare\Rule\Validate\Blank::__invoke
     */
    public function testValidationofUninitializedValue(): void
    {
        $subject = new class { public $field; };

        $this->assertTrue(call_user_func_array($this->class, [ $subject, 'field' ]));
    }

    /**
     * Test validation success.
     *
     * @param mixed $value Not NULL value
     *
     * @dataProvider blankProvider
     * @covers       Lunr\Flare\Rule\Validate\Blank::__invoke
     */
    public function testValidationSuccess($value): void
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
     * @dataProvider notBlankProvider
     * @covers       Lunr\Flare\Rule\Validate\Blank::__invoke
     */
    public function testValidationFailure($value): void
    {
        $subject = new stdClass();

        $subject->field = $value;

        $this->assertFalse(call_user_func_array($this->class, [ $subject, 'field' ]));
    }

}

?>
