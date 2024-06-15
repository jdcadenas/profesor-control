<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;

class RestService
{
    /**
     * @param string $uri
     * @param array $data
     *
     * @return mixed|null|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function get($uri = '', $data = [])
    {
        return $this->request($uri, 'GET', $data);
    }


    /**
     * @param string $uri
     * @param array $data
     *
     * @return mixed|null|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function post($uri = '', $data = [])
    {
        return $this->request($uri, 'POST', $data);
    }

    /**
     * @param string $uri
     * @param array $data
     *
     * @return mixed|null|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function put($uri = '', $data = [])
    {
        return $this->request($uri, 'PUT', $data);
    }

    /**
     * @param string $uri
     * @param array $data
     *
     * @return mixed|null|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    public function delete($uri = '', $data = [])
    {
        return $this->request($uri, 'DELETE', $data);
    }

    /**
     * @param $uri
     * @param $method
     * @param $data
     *
     * @return mixed|null|\Psr\Http\Message\ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    private function request($uri, $method, $data)
    {
        $client = new Client();
        try {
            $data = json_decode($client->request(
                $method,
                $uri,
                ["query" => $data]
            )->getBody(), true);

            $response = [
                'success' => true,
                'data' => $data
            ];
        } catch (BadResponseException $e) {
            $response = $e->getResponse();
            $data = collect(json_decode((string)$response->getBody(), true))->except('status');

            $response = [
                'success' => false,
                'code' => $e->getCode(),
                'data' => $data
            ];
        }

        return $response;
    }
}
