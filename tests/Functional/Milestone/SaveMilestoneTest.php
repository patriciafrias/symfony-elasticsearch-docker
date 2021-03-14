<?php
declare(strict_types=1);

namespace App\Tests\Functional\Milestone;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SaveMilestoneTest extends WebTestCase
{
    /**
     * @test
     */
    public function saveMilestone_shouldPersistANewMilestone()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $form = $crawler->selectButton('Save')->form();

        $form['milestone[height]'] = '60';

        $client->submit($form);

        $this->assertEquals(200, $client->getResponse()->getStatusCode());

        $content = $client->getResponse()->getContent();

        $this->assertStringContainsString('New Milestone Added!', $content);
    }
}
