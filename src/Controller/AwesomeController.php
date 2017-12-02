<?php

/**
 * Created by PhpStorm.
 * User: contact@smaine.me
 * Date: 02/12/2017
 * Time: 10:14
 */

namespace  App\Controller;

use App\Form\BookingType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class AwesomeController extends Controller
{

    /**
     * @Route("/", name="home")
     */
    public function index() {

        return $this->render('index.html.twig');
    }

    /**
     * @Route("/booking", name="booking")
     */
    public function booking(Request $request) {

        $form = $this->createForm(BookingType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            // DO SOME STUFF
            $booking = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
             $em = $this->getDoctrine()->getManager();
            $em->persist($booking);
            $em->flush();

            return $this->redirectToRoute('home');
        }
        return $this->render('booking.html.twig',
            [
                'form' => $form->createView()
            ]);
    }

    /**
     * @Route("/review", name="review")
     */
    public function review(Request $request) {


        return $this->render('review.html.twig');
    }
}
