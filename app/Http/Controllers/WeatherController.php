<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://www.gismeteo.ua/weather-zaporizhia-5093/');
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $res = curl_exec($ch);
        curl_close($ch);

        $doc = \phpQuery::newDocument($res);

        // for svg tooltips
        $tooltips = array();
        foreach ($doc->find('.tooltip') as $key => $val)
        {
            if($key == 2)
            {
                $tooltips[$key] = ($val->attributes[2]->value);
                continue;
            }
            $tooltips[$key] = ($val->attributes[1])->value;
            if($key >= 10)
                break;
        }

        $temperatures = $doc->find('span.unit_temperature_c');
        $wind = $doc->find('.w_wind .w_wind__warning .unit_wind_m_s');
        $precipitation = $doc->find('.widget__item .w_prec .w_prec__value');

        //find svg
        $doc->find('.svg-temperature')->remove();
        $svg_file = $doc->find('.tooltip svg');
        $find_string = '<svg';
        $position = strpos($svg_file, $find_string);

        $svg_file_new = substr($svg_file, $position);
        $imgs = explode('</svg>', $svg_file_new);

        return view('weather', compact( 'doc', 'tooltips', 'temperatures', 'wind', 'imgs', 'precipitation'));

    }

}