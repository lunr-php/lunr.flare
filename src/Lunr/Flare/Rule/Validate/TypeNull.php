<?php

/**
 * This file contains the Null validation class.
 *
 * SPDX-FileCopyrightText: Copyright 2025 Framna Netherlands B.V., Zwolle, The Netherlands
 * SPDX-License-Identifier: MIT
 */

namespace Lunr\Flare\Rule\Validate;

/**
 * Validates that the value is NULL
 */
class TypeNull
{

    /**
     * Validates that the value is NULL.
     *
     * @param object $subject The subject to be filtered.
     * @param string $field   The subject field name.
     *
     * @return bool TRUE if valid, FALSE if not.
     */
    public function __invoke(object $subject, string $field): bool
    {
        return is_null($subject->$field);
    }

}

?>
