<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class ServicioService
{
    protected Client $httpClient;
    protected string $baseUrl;
    public function __construct()
    {
        // Constructor logic here
        $this->$baseUrl = rtrim('API_BASE_URL', 'http://localhost:5115','/');
        $this->httpClient = new Client([
            'base_uri' => $this->baseUrl,
            'timeout'  => 10,
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    public function getAllServicios()
    {
        // Logic to retrieve all servicios
        try {
            $response = $this->httpClient->get('/Servicios');
            $data = json_decode($response->getBody(), true);
            return $data;
        } catch (\Exception $e) {
            Log::error('Error fetching servicios: ' . $e->getMessage());
            return [];
        }
    }

    public function getServicioById($id)
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

    public function createServicio($data)
    {
        // Logic to create a new servicio
    }

    public function updateServicio($id, $data)
    {
        // Logic to update an existing servicio
    }

    public function deleteServicio($id)
    {
        // Logic to delete a servicio
    }
}
