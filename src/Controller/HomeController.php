<?php
/**
 * Created by PhpStorm.
 * User: bleduc
 * Date: 30/01/18
 * Time: 19:16
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    /**
     * @Route("/")
     */
    public function index()
    {
        return $this->render('home.html.twig');
    }

}