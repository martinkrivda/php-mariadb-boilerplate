<?php

use PHPUnit\Framework\TestCase;

final class EnvTest extends TestCase
{
    public function testEnvGetReturnsDefaultWhenMissing(): void
    {
        putenv('UNIT_TEST_MISSING');

        $this->assertSame('fallback', env_get('UNIT_TEST_MISSING', 'fallback'));
    }

    public function testEnvGetReturnsValue(): void
    {
        putenv('UNIT_TEST_VALUE=hello');

        $this->assertSame('hello', env_get('UNIT_TEST_VALUE', 'fallback'));
    }
}
