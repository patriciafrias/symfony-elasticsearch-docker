<?php
declare(strict_types=1);

namespace App\Milestone\Infrastructure\Controller;

use App\Milestone\Application\Search;
use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SearchController extends AbstractController
{
    private Search $search;

    public function __construct()
    {
        $this->search = new Search(
            ClientBuilder::create()->setHosts(['elasticsearch:9200'])->build()
        );
    }

    /**
     * @Route("/search", methods={"GET"}, name="search")
     */
    public function __invoke(): JsonResponse
    {
        $params = [
            'index' => 'testindex',
            'type' => 'test',
//            'body' => [
//                'query' => [
//                    'match' => [
//                        'replaceKey' => 'replaceValue'
//                    ]
//                ]
//            ]
        ];

        $response = new JsonResponse($this->search->search($params));

        $response->setEncodingOptions($response->getEncodingOptions() | JSON_PRETTY_PRINT);

        return $response;
    }
}
