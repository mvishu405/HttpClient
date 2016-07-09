<?php

namespace HttpClient\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use HttpClient\Http\Requests;

class ClientController extends Controller
{
    protected function performRequest($method, $url, $parameter = [])
    {
    	$client = new Client(['curl' => [CURLOPT_CAINFO => base_path('resources/certs/cacert.pem')]]);

    	$response = $client->request($method, $url, $parameter);

    	return $response->getBody()->getContents();
    }
}
