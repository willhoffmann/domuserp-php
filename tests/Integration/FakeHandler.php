<?php

namespace DomusErp\SdkTest\Integration;

use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response as Psr7Response;
use PHPUnit\Framework\TestCase;

class FakeHandler extends TestCase
{
    public static function mockResponses(array $keys = [])
    {
        $responses = [];
        foreach ($keys as $key) {
            $responses[] = new Psr7Response(200, [], file_get_contents(__DIR__ . '/responses/' . $key . '.json'));
        }

        return HandlerStack::create(new MockHandler($responses));
    }

    public static function getJson($key)
    {
        return json_decode(file_get_contents(__DIR__ . '/responses/' . $key . '.json'));
    }
}