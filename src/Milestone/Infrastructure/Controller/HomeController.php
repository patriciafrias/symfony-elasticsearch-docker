<?php
declare(strict_types=1);

namespace App\Milestone\Infrastructure\Controller;

use App\Milestone\Application\SaveNewMilestoneCommand;
use App\Milestone\Domain\Bus\Command\CommandBus;
use App\Milestone\Infrastructure\Form\MilestoneType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    private CommandBus $commandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    /**
     * @Route("/", methods={"GET", "POST"}, name="home")
     * @Template("home.html.twig")
     */
    public function __invoke(Request $request): array
    {
        $milestoneForm = $this->createForm(MilestoneType::class);

        $milestoneForm->handleRequest($request);

        if ($milestoneForm->isSubmitted() && $milestoneForm->isValid()) {
            $data = $milestoneForm->getData();

            $height = (float) $data['height'];

            $command = new SaveNewMilestoneCommand($height);

            $this->commandBus->dispatch($command);
        }

        return [
            'message' => '',
            'milestoneForm' => $milestoneForm->createView()
        ];
    }
}
