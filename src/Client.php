<?php

namespace O21\BTCPayGreenfieldApi;

use GuzzleHttp\Client as GuzzleClient;

class Client
{
    use Endpoints\Invoice;

    protected GuzzleClient $client;

    public function __construct(
        protected string $baseUrl,
        protected string $apiKey,
        protected ?string $storeId = null,
    ) {
        $this->client = new GuzzleClient([
            'base_uri' => $baseUrl,
            'headers' => [
                'Accept' => 'application/json',
                'Authorization' => 'token '.$this->apiKey,
                'Content-Type' => 'application/json',
            ],
        ]);
    }

    public function getStoreId(): ?string
    {
        return $this->storeId;
    }

    public function setStoreId(?string $storeId): void
    {
        $this->storeId = $storeId;
    }
}
