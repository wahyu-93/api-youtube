<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

class YoutubeController extends Controller
{
    public function index()
    {
        if(session()->has('query_search')){
            $query = session('query_search');
        }
        else {
            $query = 'laravel api';
        };
        $videoLists = $this->_videoLists($query);
        return view('index',compact('videoLists'));
    }

    public function results(Request $request)
    {
        session(['query_search' => $request->search]);
        $videoLists = $this->_videoLists($request->search);
        return view('results', compact('videoLists'));
    }

    public function watch()
    {
        return view('watch');
    }

    protected function _videoLists($keywords)
    {
        $part = "snippet";
        $maxResults = 12;
        $regionCode = "BD";
        $type = "video";
        $key = config('services.youtube.api_key');
        $endpoint = config('services.youtube.search');

        // https://www.googleapis.com/youtube/v3/search?part=&maxResults=&regionCode=&type=&key=&q=
        $url = "$endpoint?part=$part&maxResults=$maxResults&regionCode=$regionCode&type=$type&key=$key&q=$keywords";
        $response = Http::get($url);
        $results = json_decode($response);

        File::put(storage_path() . '/app/public/results.json', $response->body());
        return $results;
    }
}
