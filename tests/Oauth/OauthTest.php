<?php

declare(strict_types=1);

namespace YdgTest\Oauth;

use PHPUnit\Framework\TestCase;
use Ydg\DouyinOpenSdk\Douyin;

class OauthTest extends TestCase
{
    public function testClientToken()
    {
        $app = new Douyin();
        $response = $app->oauth->client_token([
            'client_key' => getenv('CLIENT_KEY'),
            'client_secret' => getenv('CLIENT_SECRET'),
        ]);
        $this->assertArrayHasKey('message', $response);
        $this->assertEquals('success', $response['message']);
        $this->assertArrayHasKey('data', $response);
        $this->assertArrayHasKey('access_token', $response['data']);
    }
}
