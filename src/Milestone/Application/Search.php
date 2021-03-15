<?php
declare(strict_types=1);

namespace App\Milestone\Application;

use Elasticsearch\Client;

class Search
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function search(array $tplParams = []): array
    {
        return $this->client->search($tplParams);
    }
}
