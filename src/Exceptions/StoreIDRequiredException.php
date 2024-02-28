<?php

namespace O21\BTCPayGreenfieldApi\Exceptions;

class StoreIDRequiredException extends \Exception
{
    public function __construct(
        string $message = 'Store ID is required',
        int $code = 0,
        ?\Throwable $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }

    public static function assert($value): void
    {
        if (empty($value)) {
            throw new self();
        }
    }
}
