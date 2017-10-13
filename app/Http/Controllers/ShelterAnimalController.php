<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\HandlerStack;
use Kevinrob\GuzzleCache\CacheMiddleware;
use Kevinrob\GuzzleCache\Storage\Psr6CacheStorage;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Kevinrob\GuzzleCache\Strategy\PrivateCacheStrategy;
use Kevinrob\GuzzleCache\Strategy\GreedyCacheStrategy;

class ShelterAnimalController extends Controller
{
    private $client;
    private $client_uri = 'http://data.coa.gov.tw/Service/OpenData/AnimalOpenData.aspx';
    // animals per page
    private $items_per_page = 10;
    // maximum random page
    private $max_page = 2000;
    // query preset
    private $animal_status = 'OPEN';
    private $filter;
    // maxium number of animals to fetch
    private $top = 99999;

    /*
    政府資料開放平臺
    https://data.gov.tw/dataset/9842

    相關網址
    http://animal-adoption.coa.gov.tw/animal

    授權說明網址
    http://data.gov.tw/license

    Data variables and description:
    animal_id                   = 動物的流水編號
    animal_subid                = 動物的區域編號
    animal_area_pkid            = 動物所屬縣市代碼
    animal_shelter_pkid         = 動物所屬收容所代碼
    animal_place                = 動物的實際所在地
    animal_kind                 = 動物的類型
    animal_sex                  = 動物性別
    animal_bodytype             = 動物體型
    animal_colour               = 動物毛色
    animal_age                  = 動物年紀
    animal_sterilization        = 是否絕育
    animal_bacterin             = 是否施打狂犬病疫苗
    animal_foundplace           = 動物尋獲地
    animal_title                = 動物網頁標題
    animal_status               = 動物狀態
    animal_remark               = 資料備註
    animal_caption              = 其他說明
    animal_opendate             = 開放認養時間(起)
    animal_closeddate           = 開放認養時間(迄)
    animal_update               = 動物資料異動時間
    animal_createtime           = 動物資料建立時間
    shelter_name                = 動物所屬收容所名稱
    album_name                  = 圖片名稱(原始名稱)
    album_file                  = 圖片名稱
    album_base64                = 圖片base64編碼
    album_update                = 圖片異動時間
    cDate                       = 異動時間
    shelter_address             = 收容所地址
    shelter_tel                 = 收容所電話
    */

    public function __construct()
    {
        // Create a Custom Cached Guzzle Client
        $this->client = $this->getGuzzleFileCachedClient();
        // preset filter
        $this->filter = 'animal_status+like+' . $this->animal_status;
    }

    public function index( $filter = null )
    {
        return $this->getResponse( 1, $filter );
    }

    public function getRandomPage()
    {
        // list a random page of animals
        $page = rand( 1, $this->max_page );

        return $this->getResponse( $page );
    }

    public function getPage( int $page = 1, $filter = null )
    {
        return $this->getResponse( $page, $filter );
    }

    public function getTotalNumbers()
    {
        $params = [
            'query' => [
                '$top'      => $ths->top,
                '$skip'     => 0,
                '$filter'   => $this->filter
            ]
        ];
        $response = $this->client->request('GET', $this->client_uri, $params);

        return count( json_decode( $response->getBody() ) );
    }

    private function getResponse( int $page = 1, $filter = null )
    {
        $offset = ($page - 1) * $this->items_per_page;
        if ( $filter )
        {
            $this->filter .= '+and+' . $filter;
        }

        // echo $this->filter;
        $params = [
            'query' => [
                '$top'      => $this->items_per_page,
                '$skip'     => $offset,
                '$filter'   => $this->filter
            ]
        ];

        $response = $this->client->request('GET', $this->client_uri, $params);

        if ( count( json_decode( $response->getBody() ) ) )
        {
            // dump(json_decode( $response->getBody() ));
            return $response->getBody();
        }
        else
        {
            // echo "empty";
            return response()->json([
                'success' => false
            ]);
        }
    }

    /**
    * Returns a GuzzleClient that uses a file based cache manager
    *
    * @return Guzzle Http Client
    */
    private function getGuzzleFileCachedClient(){
        // Create a HandlerStack
        $stack = HandlerStack::create();

        // 1 day to keep the cache
        $TTL = 60 * 60 * 24;

        // Create Folder GuzzleFileCache inside the providen cache folder path
        $requestCacheFolderName = 'GuzzleFileCache';

        // Retrieve the bootstrap folder path of your Laravel Project
        $cacheFolderPath = base_path() . "/bootstrap";

        // Instantiate the cache storage: a PSR-6 file system cache with
        // a default lifetime of 10 minutes (60 seconds).
        $cache_storage = new Psr6CacheStorage(
            new FilesystemAdapter(
                $requestCacheFolderName,
                $TTL,
                $cacheFolderPath
            )
        );

        // Add Cache Method
        $stack->push(
            new CacheMiddleware(
                new GreedyCacheStrategy(
                    $cache_storage,
                    $TTL // the TTL in seconds
                )
            ),
            'greedy-cache'
        );

        // Initialize the client with the handler option and return it
        return new Client(['handler' => $stack]);
    }
}
