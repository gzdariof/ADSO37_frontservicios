<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Log;

class ServicioService
{
    protected Client $client;
    protected string $baseUrl;
    public function __construct()
    {
        // Constructor logic here
        $this->baseUrl = rtrim(env('API_BASE_URL', 'http://localhost:5216'), '/');

        $this->client = new Client([
            'base_uri' => $this->baseUrl,
            'timeout'  => 10,
            'verify'   => false,
            'headers'  => [
                'Content-Type' => 'application/json',
                'Accept'       => 'application/json',
            ],
        ]);
    }

    public function getAll(): array
    {
        // Logic to retrieve all servicios
        try {
            $response = $this->client->get('/Servicios');
            return json_decode($response->getBody()->getContents(), true) ?? [];
        } catch (RequestException $e) {
            Log::error('ServicioService::getAll - ' . $e->getMessage());
            return [];
        }
    }

    public function getServicioById($id) : ?array
    {
        // Logic to retrieve a servicio by its ID
        try {
            $response = $this->httpClient->get("/Servicios/$id");
            $data = json_decode($response->getBody(), true);
            return $data;
        } catch (\Exception $e) {
            Log::error('Error fetching servicio: ' . $e->getMessage());
            return [];
        }
    }

    public function createServicio($data): array
    {
        // Logic to create a new servicio
    }

    public function updateServicio($id, $data): array
    {
        // Logic to update an existing servicio
    }

    public function deleteServicio($id): array
    {
        // Logic to delete a servicio
    }
}
