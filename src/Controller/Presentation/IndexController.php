<?php
/**
 * Created by PhpStorm.
 * User: bleduc
 * Date: 31/01/18
 * Time: 21:42
 */
namespace App\Controller\Presentation;

use App\Entity\TimelineEvent;
use App\Repository\TimelineEventRepository;
use App\Repository\TimelineEventTypeRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends Controller
{
    /**
     * @var TimelineEventRepository
     */
    private $timelineEventRepository;

    /**
     * @var TimelineEventTypeRepository
     */
    private $timelineEventTypeRepository;

    public function __construct(TimelineEventRepository $timelineEventRepository, TimelineEventTypeRepository $timelineEventTypeRepository) {
        $this->timelineEventRepository = $timelineEventRepository;
        $this->timelineEventTypeRepository = $timelineEventTypeRepository;
    }

    /**
     * @Route("/presentation", name="presentation", methods={"GET"})
     * @return Response
     */
    public function index()
    {
        return $this->render('presentation/index.html.twig', ['events' => $this->data(['Start', 'Work'])]);
    }

    /**
     * @Route("/presentation", name="presentation_update", methods={"POST"})
     * @param Request $request
     * @return Response
     */
    public function update(Request $request)
    {
        $types = $request->get('types', ['Start', 'Work']);
        return $this->render('presentation/timeline.html.twig', ['events' => $this->data($types)]);
    }

    protected function data($filter = []) {
        $events = $this->timelineEventRepository->findBy(['enabled' => true]);

        // filtering & sorting
        if(count($filter) > 0) {
            foreach($events as $key => $event) {
                $event_type = $event->getType()->getName();

                if(!in_array($event_type, $filter)) {
                    unset($events[$key]);
                }
            }
        }
        usort($events, array(get_class(), '_orderBy_events'));

        return $events;
    }

    private function _orderBy_events(TimelineEvent $a, TimelineEvent $b) {
        return $a->getDateStart() < $b->getDateStart();
    }

}