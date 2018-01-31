<?php
/**
 * Created by PhpStorm.
 * User: bleduc
 * Date: 31/01/18
 * Time: 21:40
 */
namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ContactController extends Controller
{
    /**
     * @Route("/contact", name="contact", methods={"GET"})
     */
    public function index()
    {
        return $this->render('contact.html.twig');
    }

    /**
     * @Route("/contact", name="contact_send", methods={"POST"})
     * @param Request $request
     */
    public function send(Request $request)
    {
        $firstName  = $request->get('firstName');
        $lastName   = $request->get('lastName');
        $email      = $request->get('email');
        $message    = $request->get('message');

        $headers    = 'From: "' .$firstName. ' ' .$lastName. '"<' .$email. '>'."\n";
        $headers   .= 'Content-Type: text/html; charset="utf-8"';
        mail(getenv('MAILTO'), '[' .date('Y-m-d H:i:s'). '] mealtime.io - ContactForm', $message, $headers);
    }

}