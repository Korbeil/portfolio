<?php
/**
 * Created by PhpStorm.
 * User: bleduc
 * Date: 30/01/18
 * Time: 19:16
 */

namespace App\Controller\Blog;

use App\Repository\PostRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends Controller
{
    /**
     * @var PostRepository
     */
    private $postRepository;

    public function __construct(PostRepository $postRepository) {
        $this->postRepository = $postRepository;
    }

    /**
     * @Route("/", name="blog_index")
     * @return Response
     */
    public function index() {
        $posts = $this->postRepository->findForHomepage();
        return $this->render('blog/index.html.twig', [
            'posts' => $posts
        ]);
    }

    /**
     * @Route("/blog/{slug}", name="blog_post")
     * @param $slug
     * @return Response
     */
    public function post($slug) {
        $post = $this->postRepository->findBySlug($slug);
        return $this->render('blog/post.html.twig', [
            'post' => $post
        ]);
    }

}