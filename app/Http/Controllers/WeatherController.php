<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class WeatherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
//        $userAgent = 'Mozilla/5.0 (Windows NT 10.0)'
//            . ' AppleWebKit/537.36 (KHTML, like Gecko)'
//            . ' Chrome/48.0.2564.97'
//            . ' Safari/537.36';
//        $headers = array('User-Agent' => $userAgent);

        $client = new Client();
        $request = $client->request('GET', 'https://www.gismeteo.ua/weather-zaporizhia-5093/', [
            'headers' => [
                'content-type' => 'text/html; charset=utf-8',
                'content-encoding' => 'gzip',
                'User-Agent' => 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/78.0.3904.108 Mobile Safari/537.36',
                'accept-encoding' => 'gzip',
                'accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3',
            ]
        ]);
        $html = $request->getBody()->getContents();
        $dom = HtmlDomParser::str_get_html($html);
        dd($dom);
//        $client = new Client();
//
//        $request = $client->get('http://www.gismeteo.ua/weather-zaporizhia-5093/');
//        $response = $request->getBody()->getContents();
//        dd($response);
//        return view('weather');
    }
}