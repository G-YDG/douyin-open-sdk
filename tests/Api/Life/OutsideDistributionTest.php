<?php

declare(strict_types=1);

namespace YdgTest\Api\Life;

use PHPUnit\Framework\TestCase;
use Ydg\DouyinOpenSdk\Douyin;

class OutsideDistributionTest extends TestCase
{
    protected static $accessToken = null;

    public function testQueryPid()
    {
        $app = new Douyin(['access_token' => $this->getAccessToken()]);
        $response = $app->lifeOutsideDistribution->query_pid([
            'uid' => getenv('UID'),
            'cursor' => 0,
            'count' => 10,
        ]);
        $this->assertIsArray($response);
        $this->assertArrayHasKey('data', $response);
        $this->assertArrayHasKey('err_no', $response);
        $this->assertEquals(0, $response['err_no']);
    }

    protected function getAccessToken()
    {
        if (self::$accessToken == null) {
            $app = new Douyin();
            $response = $app->oauth->client_token([
                'client_key' => getenv('CLIENT_KEY'),
                'client_secret' => getenv('CLIENT_SECRET'),
            ]);
            self::$accessToken = $response['data']['access_token'] ?? '';
        }
        return self::$accessToken;
    }

    public function testSearchProduct()
    {
        $app = new Douyin(['access_token' => $this->getAccessToken()]);
        $response = $app->lifeOutsideDistribution->search_product([
            'uid' => getenv('UID'),
            'cursor' => 0,
            'count' => 10,
            'sort_by' => 1,
            'order_by' => 1,
        ]);
        $this->assertIsArray($response);
        $this->assertArrayHasKey('data', $response);
        $this->assertArrayHasKey('err_no', $response);
        $this->assertEquals(0, $response['err_no']);
    }

    public function testCommandParseAndShare()
    {
        $app = new Douyin(['access_token' => $this->getAccessToken()]);

        $productData = $app->lifeOutsideDistribution->search_product([
            'uid' => getenv('UID'),
            'cursor' => 0,
            'count' => 10,
            'sort_by' => 1,
            'order_by' => 1,
        ])['data']['product_list'];

        $response = $app->lifeOutsideDistribution->command_parse_and_share([
            'uid' => getenv('UID'),
            'command' => (string)$productData[0]['id'],
            'share_params' => [
                'pid' => getenv('PID'),
                'external_info' => 'test',
                'need_command' => true,
            ],
        ]);
        $this->assertIsArray($response);
        $this->assertArrayHasKey('data', $response);
        $this->assertArrayHasKey('err_no', $response);
        $this->assertEquals(0, $response['err_no']);
    }

    //    public function testCreatePid()
    //    {
    //        $app = new Douyin(['access_token' => $this->getAccessToken()]);
    //        $response = $app->lifeOutsideDistribution->create_pid([
    //            'uid' => getenv('UID'),
    //            'media_type' => -1,
    //            'media_name' => '测试',
    //            'site_name' => '测试',
    //        ]);
    //        $this->assertIsArray($response);
    //        $this->assertArrayHasKey('err_no', $response);
    //        $this->assertArrayHasKey('data', $response);
    //        $this->assertEquals(0, $response['err_no']);
    //    }

    public function testQueryOrder()
    {
        $app = new Douyin(['access_token' => $this->getAccessToken()]);
        $response = $app->lifeOutsideDistribution->query_order([
            'uid' => getenv('UID'),
            'cursor' => '',
            'count' => 10,
            'pay_time_begin' => time() - 3600,
            'pay_time_end' => time(),
        ]);
        $this->assertIsArray($response);
        $this->assertArrayHasKey('data', $response);
        $this->assertArrayHasKey('err_no', $response);
        $this->assertEquals(0, $response['err_no']);
    }

    public function testDownload()
    {
        $app = new Douyin(['access_token' => $this->getAccessToken()]);
        $response = $app->lifeOutsideDistribution->download([
            'uid' => getenv('UID'),
            'date' => date('Y-m-d', strtotime('-1 day')),
            'file_type' => 1,
        ]);
        $this->assertIsArray($response);
        $this->assertArrayHasKey('data', $response);
        $this->assertArrayHasKey('err_no', $response);
        $this->assertEquals(0, $response['err_no']);
    }
}
