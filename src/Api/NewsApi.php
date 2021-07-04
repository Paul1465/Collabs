<?php
namespace App\Api;


use SymfonyContractsHttpClientHttpClientInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class NewsApi
{
private $client_id = "polo.fou33@gmail.com";
private $secret_key = "a5cf2bd22ea04525b9486c557dcae55c";
private $redirect_uri = "https://localhost:8000";
private $authorisation_url = "https://newsapi.org/v2/everything?q=Apple&from=2021-07-03&sortBy=popularity&apiKey=a5cf2bd22ea04525b9486c557dcae55c";

public function __construct(HttpClientInterface $client)
{
    $this->client = $client;
}

public function get_authorisation_code() {
    $response = $this->client->request(
        'GET',
        $this->authorisation_url,
        [
            'query' => [
                'response_type' => 'code',
                'redirect_uri' => $this->redirect_uri,
                'client_id' => $this->client_id,
            ]
        ]
    );

    return $response->getContent();
}
}