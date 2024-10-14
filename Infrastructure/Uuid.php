<?php

namespace app\Infrastructure;

use DomainException;
use Ramsey\Uuid\Exception\UnsupportedOperationException;
use Webmozart\Assert\Assert;
use Webmozart\Assert\InvalidArgumentException;

final class Uuid
{
    private string $value;

    /**
     * @throws DomainException
     */
    public function __construct(string $value)
    {
        try {
            Assert::notEmpty($value);
        } catch (InvalidArgumentException $e) {
            throw new DomainException($e->getMessage(), $e->getCode(), $e);
        }
        $this->value = $value;
    }

    public function __toString(): string
    {
        return $this->getValue();
    }

    /**
     * @throws DomainException
     */
    public static function next():string
    {
        try {
            $uuid = \Ramsey\Uuid\Uuid::uuid4()->toString();
            return substr(md5($uuid), 0, 5);
        } catch (DomainException|UnsupportedOperationException $e) {
            throw new DomainException($e->getMessage(), $e->getCode(), $e);
        }
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
