<?php

namespace HttpClient\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use HttpClient\Http\Requests;
use HttpClient\Exceptions\EmptyDataException;

class ClientController extends Controller
{
    protected function performRequest($method, $url, $parameters = [])
    {
    	$client = new Client([
            'curl' => [CURLOPT_CAINFO => base_path('resources/certs/cacert.pem')],
            'base_uri' => config('api.base_uri'),
            ]);

    	$response = $client->request($method, $url, $parameters);

    	return $response->getBody()->getContents();
    }

    protected function performGetRequest($url)
    {
    	$contents =  $this->performRequest('GET', $url);

    	$decodedContents = json_decode($contents);

    	$data = $decodedContents->data;

        if(sizeof($data) > 0)
        {
            return $data;
        }

        throw new EmptyDataException("The {$url} return an empty collection");
        
    }

    protected function obtainAccessToken()
    {
        $grantType = config('api.grant_type');
        $clientId = config('api.client_id');
        $clientSecret = config('api.client_secret');

        $contents = $this->performRequest('POST', 'oauth/access_token',[
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

    protected function performPutRequest($url, $parameters = [])
    {
        $contents =  $this->performAuthorizedRequest('PUT', $url, $parameters);

        $decodedContents = json_decode($contents);

        return $decodedContents->data;
    }

    protected function performDeleteRequest($url, $parameters = [])
    {
        $contents =  $this->performAuthorizedRequest('DELETE', $url, $parameters);

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
    	return $this->performGetRequest('students');
    }

    protected function obtainOneStudent($studentId)
    {
        return $this->performGetRequest("students/{$studentId}");
    }

    protected function createOneStudent($parameters)
    {
        return $this->performPostRequest('students', $parameters);
    }

    protected function updateOneStudent($parameters)
    {
        $studentId = $parameters['id'];
        return $this->performPutRequest("students/{$studentId}", $parameters);
    }

    protected function removeOneStudent($parameters)
    {
        $studentId = $parameters['id'];
        return $this->performDeleteRequest("students/{$studentId}");
    }

    /**
     * Functions for Courses stuff
     */
    protected function obtainAllCourses()
    {
        return $this->performGetRequest('courses');
    }

    protected function obtainOneCourse($courseId)
    {
        return $this->performGetRequest("courses/{$courseId}");
    }

    /**
     * Functions for Teachers stuff
     */
    protected function obtainAllTeachers()
    {
        return $this->performGetRequest('teachers');
    }

    protected function obtainOneTeacher($teacherId)
    {
        return $this->performGetRequest("teachers/{$teacherId}");
    }

    protected function createOneTeacher($parameters)
    {
        return $this->performPostRequest('teachers', $parameters);
    }

    protected function updateOneTeacher($parameters)
    {
        $teacherId = $parameters['id'];
        return $this->performPutRequest("teachers/{$teacherId}", $parameters);
    }

    protected function removeOneTeacher($parameters)
    {
        $teacherId = $parameters['id'];
        return $this->performDeleteRequest("teachers/{$teacherId}");
    }


    /**
     * Courses - Students functions
     */
    protected function obtainCourseStudents($courseId)
    {
        return $this->performGetRequest("courses/{$courseId}/students");
    }

    protected function addStudentToCourse($courseId, $studentId)
    {
        return $this->performPostRequest("courses/{$courseId}/students/{$studentId}");
    }

    protected function removeCourseStudent($parameters)
    {
        $studentId = $parameters['studentId'];
        $courseId = $parameters['courseId'];

        return $this->performDeleteRequest("courses/{$courseId}/students/{$studentId}");
    }


    /**
     * Teachers  - Courses functions
     */
    protected function obtainTeacherCourses($teacherId)
    {
        return $this->performGetRequest("teachers/{$teacherId}/courses");
    }

    protected function createOneCourse($parameters)
    {
        $teacherId = $parameters['teacherId'];
        return $this->performPostRequest("teachers/{$teacherId}/courses", $parameters);
    }

    protected function updateOneCourse($parameters)
    {
        $teacherId = $parameters['teacherId'];
        $courseId = $parameters['courseId'];
        return $this->performPutRequest("teachers/{$teacherId}/courses/{$courseId}", $parameters);
    }

    protected function removeOneCourse($parameters)
    {
        $courseId = $parameters['courseId'];
        $teacherId = $parameters['teacherId'];

        return $this->performDeleteRequest("teachers/{$teacherId}/courses/{$courseId}");
    }

}
