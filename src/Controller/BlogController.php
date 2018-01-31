<?php
/**
 * Created by PhpStorm.
 * User: bleduc
 * Date: 30/01/18
 * Time: 19:16
 */

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BlogController extends Controller
{
    /**
     * @Route("/", name="blog_index")
     */
    public function index()
    {
        return $this->render('blog.html.twig');
    }

}