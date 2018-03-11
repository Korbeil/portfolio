<?php
/**
 * Created by PhpStorm.
 * User: bleduc
 * Date: 31/01/18
 * Time: 21:36
 */
namespace App\Controller\Project;

use App\Repository\ProjectRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Yaml\Yaml;

class IndexController extends Controller
{
    /**
     * @var ProjectRepository
     */
    private $projectRepository;

    public function __construct(ProjectRepository $projectRepository) {
        $this->projectRepository = $projectRepository;
    }

    /**
     * @Route("/projects", name="projects")
     */
    public function listing()
    {
        $projects = $this->projectRepository->findEnabled();
        $projects = array_chunk($projects, 2);

        return $this->render('project/index.html.twig', [
            'projects' => $projects
        ]);
    }

}