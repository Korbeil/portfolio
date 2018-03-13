<?php
/**
 * Created by PhpStorm.
 * User: bleduc
 * Date: 31/01/18
 * Time: 21:40
 */
namespace App\Controller\Contact;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexController extends Controller
{
    /**
     * @Route("/contact", name="contact", methods={"GET"})
     * @return Response
     */
    public function index()
    {
        return $this->render('contact/index.html.twig');
    }

    /**
     * @Route("/contact", name="contact_send", methods={"POST"})
     * @param Request $request
     * @param \Swift_Mailer $mailer
     * @return Response
     */
    public function send(Request $request, \Swift_Mailer $mailer)
    {
        $firstName  = $request->get('firstName');
        $lastName   = $request->get('lastName');
        $email      = $request->get('email');
        $content    = $request->get('message');

        $message = (new \Swift_Message('Contact'))
            ->setFrom($email, $firstName. ' ' .$lastName)
            ->setTo(getenv('MAILTO'))
            ->setBody($content);
        $mailer->send($message);

        return $this->index();
    }

}