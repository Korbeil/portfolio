<?php
/**
 * Created by PhpStorm.
 * User: bleduc
 * Date: 31/01/18
 * Time: 21:42
 */
namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PresentationController extends Controller
{
    /**
     * @Route("/presentation", name="presentation")
     */
    public function index()
    {
        return $this->render('presentation.html.twig');
    }

}