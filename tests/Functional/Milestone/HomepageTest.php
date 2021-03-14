<?php
declare(strict_types=1);

namespace App\Tests\Functional\Milestone;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HomepageTest extends WebTestCase
{
    /**
     * @test
     */
    public function homepage_shouldShowHomepage()
    {
        $client = static::createClient();

        $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $content = $client->getResponse()->getContent();
        $this->assertStringContainsString('Save', $content);
        $this->assertStringContainsString('cm', $content);
    }
}
