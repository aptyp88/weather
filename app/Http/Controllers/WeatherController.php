<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpQuery\PhpQuery;

class WeatherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
//        $ch = curl_init();
//        curl_setopt($ch, CURLOPT_URL, 'https://www.gismeteo.ua/weather-zaporizhia-5093/');
//        curl_setopt($ch, CURLOPT_HEADER, false);
//        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
//        $res = curl_exec($ch);
//        curl_close($ch);
//
//        //queries
//        $doc = new phpQuery();
//        $doc->load_str($res);
//        $t = $doc->query('time')[0]->textContent;
//        dd($t);
        return view('weather');
    }
}