<?php

/**
 * This file contains the InputValue class.
 *
 * SPDX-FileCopyrightText: Copyright 2025 Framna Netherlands B.V., Zwolle, The Netherlands
 * SPDX-License-Identifier: MIT
 */

namespace Lunr\Flare;

use Lunr\Corona\Exceptions\BadRequestException;
use Lunr\Corona\Exceptions\ClientDataHttpException;

/**
 * InputValue class.
 *
 * @phpstan-import-type ArrayReport from ClientDataHttpException
 */
class InputValue
{

    /**
     * Key name of the input value to inspect.
     * @var string
     */
    public readonly string $name;

    /**
     * Input value.
     * @var mixed
     */
    public readonly mixed $value;

    /**
     * Raw input value
     * @var bool|float|int|string|null
     */
    public readonly bool|float|int|string|null $rawValue;

    /**
     * Constructor.
     *
     * @param string                     $name  Identifier of the input value
     * @param mixed                      $value The input value
     * @param bool|float|int|string|null $raw   Raw, original input value if it's different from the current one.
     *                                          Note that if $value isn't scalar or NULL and this isn't specified,
     *                                          it will be set to NULL instead.
     */
    public function __construct(string $name, mixed $value, bool|float|int|string|null $raw = NULL)
    {
        $this->name  = $name;
        $this->value = $value;

        if (!is_null($raw))
        {
            $this->rawValue = $raw;
        }
        elseif (is_scalar($value))
        {
            $this->rawValue = $value;
        }
        else
        {
            $this->rawValue = NULL;
        }
    }

    /**
     * Destructor.
     */
    public function __destruct()
    {
        // no-op
    }

    /**
     * Mark the input value is invalid.
     *
     * @param string           $reason   Message explaining why the input value is invalid
     * @param ArrayReport|null $failures Array report of why the input value is invalid (optional)
     *
     * @throws BadRequestException Always.
     *
     * @return never
     */
    public function isInvalid(string $reason, ?array $failures = NULL): never
    {
        $exception = new BadRequestException($reason);
        $exception->setData($this->name, $this->rawValue);

        if ($failures !== NULL)
        {
            $exception->setArrayReport($failures);
        }

        throw $exception;
    }

}

?>
