<?php

/**
 * Created by PhpStorm.
 * User: contact@smaine.me
 * Date: 02/12/2017
 * Time: 10:14
 */

namespace  App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class AwesomeController extends Controller
{

    /**
     * @Route("/{awesome}", name="awesome")
     */
    public function index($awesome) {

        return $this->render('index.html.twig', [
            'awesome' => $awesome,
        ]);
    }
}
