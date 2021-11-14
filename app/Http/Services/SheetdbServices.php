<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Storage;
use Google\Client;
use Google\Service\Sheets;
use Google\Service\Sheets\ValueRange;

class SheetdbServices
{
    public $client, $service, $documentId, $range;

    public function __construct()
    {
        $this->client = $this->getClient();
        $this->service = new Sheets($this->client);
        $this->documentId = '1BCQ-BtfRjMLz0YCyktJIR1iWuS40OtXJX4AdeBKXntg';
        $this->range ='A:Z';
    }

    public function getClient()
    {
        $client = new Client();
        $client->setApplicationName('tanganica');
        $client->setRedirectUri('http://localhost:8000');
        $client->setScopes(Sheets::SPREADSHEETS);
        $credentials = Storage::path('credentials.json');
        $client->setAuthConfig($credentials);
        $client->setAccessType('offline');

        return $client;
    }

    public function readSheet()
    {
        $doc = $this->service->spreadsheets_values->get($this->documentId,$this->range);
        return $doc;
    }
}