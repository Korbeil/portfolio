<?php
/**
 * Created by PhpStorm.
 * User: bleduc
 * Date: 31/01/18
 * Time: 21:36
 */
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Yaml\Yaml;

class ProjectController extends Controller
{
    /**
     * @Route("/projects", name="projects")
     */
    public function listing()
    {
        $projects = Yaml::parseFile(__DIR__. '/../../assets/yaml/projects.yaml');
        $projects = array_chunk($projects['list'], 2);

        return $this->render('projects.html.twig', [
            'projects' => $projects
        ]);
    }

}