<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class ToolController extends Controller
{
    protected $server_status = "https://db.irowiki.org/server_status.json";

    public function ServerStatus(Request $request)
    {
        $client = new Client();
        $json = json_decode($client->request('GET', $this->server_status, ['verify' => false])->getBody(), true);

        return view('tool/status', ['data' => $json]);
    }
}
