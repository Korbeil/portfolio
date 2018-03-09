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
use App\Factory\TagFactory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Yaml\Yaml;

class ProjectFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $projects = Yaml::parseFile(__DIR__. '/../../assets/yaml/projects.yaml');

        foreach($projects['list'] as $data) {
            $project = new Project;

            $project->setEnabled(true);
            $project->setTitle($data['title']);
            $project->setUrl($data['url']);
            $project->setDescription($data['desc']);

            $tags = explode(',', $data['tags']);
            foreach($tags as $tag) {
                $tag = TagFactory::create($tag, $manager);
                $project->addTag($tag);
            }

            $manager->persist($project);
        }

        $manager->flush();
    }
}