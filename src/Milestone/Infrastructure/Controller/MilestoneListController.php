<?php
declare(strict_types=1);

namespace App\Milestone\Infrastructure\Controller;

use App\Milestone\Application\GetMilestoneListQuery;
use App\Milestone\Domain\Bus\Query\QueryBus;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MilestoneListController extends AbstractController
{
    private QueryBus $queryBus;

    public function __construct(QueryBus $queryBus)
    {
        $this->queryBus = $queryBus;
    }

    /**
     * @Route("/milestone-list", name="milestone_list")
     *
     * @Template("milestone/list.html.twig")
     */
    public function __invoke(): array
    {
        $milestoneList = $this->queryBus->dispatch(new GetMilestoneListQuery());

        return [
            'milestones' => $milestoneList,
        ];
    }
}
