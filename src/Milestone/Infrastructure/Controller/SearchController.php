<?php
declare(strict_types=1);

namespace App\Milestone\Infrastructure\Controller;

use Elasticsearch\ClientBuilder;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class SearchController extends AbstractController
{
    /**
     * @Route("/search", methods={"GET", "POST"}, name="search")
     * @Template("search.html.twig")
     */
    public function __invoke(Request $request): array
    {
        $hosts = [
            'elasticsearch:9200',         // IP + Port
        ];

        $client = ClientBuilder::create()
            ->setHosts($hosts)
            ->build();

        $params = [
            'index' => 'testindex',
            'type' => 'test',
//            'body' => [
//                'query' => [
//                    'match' => [
//                        'lastname' => 'Barba'
//                    ]
//                ]
//            ]
        ];

        $response = $client->search($params);


        $userNames = array_map(function ($item) {
            return $item['_source'];
        }, $response['hits']['hits']);

        echo '<h1>Results for Barba:</h1>';
        foreach ($userNames as $userName) {
            echo '<li>'. implode(' ', $userName) . '</li>';
        }

        echo '<h2>Entirely response:</h2> <pre>', print_r($response, true), '</pre>';

    }
}
