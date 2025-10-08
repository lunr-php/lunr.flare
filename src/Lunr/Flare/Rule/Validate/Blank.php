<?php

/**
 * This file contains the Blank validation class.
 *
 * SPDX-FileCopyrightText: Copyright 2025 Framna Netherlands B.V., Zwolle, The Netherlands
 * SPDX-License-Identifier: MIT
 */

namespace Lunr\Flare\Rule\Validate;

/**
 * Validates that the value is blank
 */
class Blank
{

    /**
     * Validates that the value is blank.
     *
     * Implementation should be in sync with \Aura\Filter\Spec\Spec::subjectFieldIsBlank()
     *
     * @param object $subject The subject to be filtered.
     * @param string $field   The subject field name.
     *
     * @return bool TRUE if valid, FALSE if not.
     */
    public function __invoke(object $subject, string $field): bool
    {
        // not set, or null, means it is blank
        if (!isset($subject->$field))
        {
            return TRUE;
        }

        // non-strings are not blank: int, float, object, array, resource, etc
        if (!is_string($subject->$field))
        {
            return FALSE;
        }

        // strings that trim down to exactly nothing are blank
        return trim($subject->$field) === '';
    }

}

?>
