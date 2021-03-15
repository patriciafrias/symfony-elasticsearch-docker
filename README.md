### Symfony app with:
Elasticsearch + Elasticsearch Head + Adminer + Docker (php-fpm, apache, mysql, elasticsearch)
**Credits: ** https://yusufbiberoglu.medium.com/symfony-search-engine-with-elasticsearch-9900cee18ec7

See **docker-compose.yml**

Tried with [friendsofsymfony/elastica-bundle](https://packagist.org/packages/friendsofsymfony/elastica-bundle) but there is a conflict with Symfony5.
Instead, I am using [elasticsearch/elasticsearch](https://packagist.org/packages/elasticsearch/elasticsearch)

- adminer » http://localhost:8089
- elastic head » http://localhost:9109/
- elastic » http://localhost:9209/
