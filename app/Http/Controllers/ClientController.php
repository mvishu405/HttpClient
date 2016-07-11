<?php

namespace HttpClient\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use HttpClient\Http\Requests;

class ClientController extends Controller
{
    protected function performRequest($method, $url, $parameters = [])
    {
    	$client = new Client(['curl' => [CURLOPT_CAINFO => base_path('resources/certs/cacert.pem')]]);

    	$response = $client->request($method, $url, $parameters);

    	return $response->getBody()->getContents();
    }

    protected function performGetRequest($url)
    {
    	$contents =  $this->performRequest('GET', $url);

    	$decodedContents = json_decode($contents);

    	return $decodedContents->data;
    }

    protected function obtainAccessToken()
    {
        $grantType = config('api.grant_type');
        $clientId = config('api.client_id');
        $clientSecret = config('api.client_secret');

        $contents = $this->performRequest('POST', 'https://lumenapi.juandmegon.com/oauth/access_token',[
                'form_params' => [
                    'grant_type' => $grantType,
                    'client_id' => $clientId,
                    'client_secret' => $clientSecret]]);

        $decodedContents = json_decode($contents);

        $accessToken = $decodedContents->access_token;

        return $accessToken;
    }

    protected function performPostRequest($url, $parameters = [])
    {
        $contents =  $this->performAuthorizedRequest('POST', $url, $parameters);

        $decodedContents = json_decode($contents);

        return $decodedContents->data;
    }

    protected function performAuthorizedRequest($method, $url, $formParameters = [])
    {
        $requestParameters['form_params'] = $formParameters;

        $accessToken = 'Bearer ' . $this->obtainAccessToken();

        $requestParameters['headers']['Authorization'] = $accessToken;

        return $this->performRequest($method, $url, $requestParameters);
    }

    /**
     * Functions for Students stuff
     */
    protected function obtainAllStudents()
    {
    	return $this->performGetRequest('https://lumenapi.juandmegon.com/students');
    }

    protected function obtainOneStudent($studentId)
    {
        return $this->performGetRequest("https://lumenapi.juandmegon.com/students/{$studentId}");
    }

    protected function createOneStudent($paremeters)
    {
        return $this->performPostRequest('https://lumenapi.juandmegon.com/students', $paremeters);
    }

    /**
     * Functions for Courses stuff
     */
    protected function obtainAllCourses()
    {
        return $this->performGetRequest('https://lumenapi.juandmegon.com/courses');
    }

    protected function obtainOneCourse($courseId)
    {
        return $this->performGetRequest("https://lumenapi.juandmegon.com/courses/{$courseId}");
    }

    /**
     * Functions for Teachers stuff
     */
    protected function obtainAllTeachers()
    {
        return $this->performGetRequest('https://lumenapi.juandmegon.com/teachers');
    }

    protected function obtainOneTeacher($teacherId)
    {
        return $this->performGetRequest("https://lumenapi.juandmegon.com/teachers/{$teacherId}");
    }
}
