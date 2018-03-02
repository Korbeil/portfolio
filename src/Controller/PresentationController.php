<?php
/**
 * Created by PhpStorm.
 * User: bleduc
 * Date: 31/01/18
 * Time: 21:42
 */
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Yaml\Yaml;

class PresentationController extends Controller
{
    /**
     * @Route("/presentation", name="presentation", methods={"GET"})
     */
    public function index()
    {
        return $this->render('presentation.html.twig', $this->data(['Start', 'Work']));
    }

    /**
     * @Route("/presentation", name="presentation_update", methods={"POST"})
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function update(Request $request)
    {
        $types = $request->get('types', ['Start', 'Work']);
        return $this->render('timeline.html.twig', $this->data($types));
    }

    protected function data($filter = []) {
        $types  = Yaml::parseFile(__DIR__. '/../../assets/yaml/types.yaml');
        $events = Yaml::parseFile(__DIR__. '/../../assets/yaml/events.yaml');

        // filtering & sorting
        if(count($filter) > 0) {
            foreach($events['list'] as $key => $event) {
                if(!in_array($event['type'], $filter)) {
                    unset($events['list'][$key]);
                }
            }
        }
        usort($events['list'], array(get_class(), '_orderBy_events'));

        return [
            'events' => $events,
            'types' => $types
        ];
    }

    private function _orderBy_events($a, $b) {
        return $a['date'] < $b['date'];
    }

}