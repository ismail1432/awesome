<?php

/**
 * Created by PhpStorm.
 * User: contact@smaine.me
 * Date: 02/12/2017
 * Time: 10:14
 */

namespace  App\Controller;

use App\Form\BookingType;
use App\Manager\BookingManager;
use App\Services\CsvCreator;
use PHPUnit\Util\Json;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;

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
    public function booking(Request $request, BookingManager $bookingManager) {

        $form = $this->createForm(BookingType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $booking = $form->getData();
            $bookingManager->save($booking);

            $this->addFlash('notice', 'Booking successfully');
            return $this->redirectToRoute('home');
        }
        return $this->render('booking.html.twig',
            [
                'form' => $form->createView()
            ]);
    }

    /**
     * @Route("/export", name="review")
     */
    public function review(Request $request,CsvCreator $csvCreator) {

        $csv = $csvCreator->createCsv();

        rename($csv, 'good.csv');
        return new JsonResponse('good');

    }



}
