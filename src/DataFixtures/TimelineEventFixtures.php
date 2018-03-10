<?php
/**
 * Created by PhpStorm.
 * User: bleduc
 * Date: 08/03/18
 * Time: 22:49
 */
// src/DataFixtures/AppFixtures.php

namespace App\DataFixtures;

use App\Entity\Project;
use App\Entity\TimelineEvent;
use App\Entity\TimelineEventType;
use App\Factory\TagFactory;
use Carbon\Carbon;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Yaml\Yaml;

class TimelineEventFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $types = Yaml::parseFile(__DIR__ . '/../../assets/yaml/types.yaml');
        $events = Yaml::parseFile(__DIR__ . '/../../assets/yaml/events.yaml');

        foreach ($types['list'] as $data) {
            $type = new TimelineEventType();

            $type->setName($data['name']);
            $type->setBackground($data['background']);
            $type->setText($data['text']);

            $types[$type->getName()] = $type;

            $manager->persist($type);
        }

        foreach ($events['list'] as $data) {
            $event = new TimelineEvent();

            $event->setName($data['name']);
            $event->setEnabled(true);
            $event->setType($types[$data['type']]);
            if(isset($data['desc'])) {
                $event->setDescription($data['desc']);
            } else {
                $event->setDescription('');
            }

            if (is_array($data['date'])) {
                $start = $data['date']['start'];
                $stop = $data['date']['end'];
            } else {
                $start = $data['date'];
                $stop = $start;
            }
            $event->setDateStart(Carbon::createFromTimestamp($start));
            $event->setDateStop(Carbon::createFromTimestamp($stop));

            $manager->persist($event);
        }

        $manager->flush();
    }
}