<?php

/**
 * This file contains the registry of validators and sanitizers in Lunr.Flare.
 *
 * SPDX-FileCopyrightText: Copyright 2025 Framna Netherlands B.V., Zwolle, The Netherlands
 * SPDX-License-Identifier: MIT
 */

namespace Lunr\Flare;

use Lunr\Flare\Rule\Validate\Blank;
use Lunr\Flare\Rule\Validate\TypeNull;

/**
 * Registry of validators and sanitizers.
 */
class Registry
{

    /**
     * Get the array of validators from Lunr.Flare.
     *
     * @return array<string,callable(): object>
     */
    public static function validate_factories(): array
    {
        return [
            'blank' => fn(): Blank => new Blank(),
            'null'  => fn(): TypeNull => new TypeNull(),
        ];
    }

    /**
     * Get the array of sanitizers from Lunr.Flare.
     *
     * @return array<string,callable(): object>
     */
    public static function sanitize_factories(): array
    {
        return [];
    }

}

?>
