<?php

/**
 * Created by PhpStorm.
 * User: contact@smaine.me
 * Date: 03/12/2017
 * Time: 11:05
 */

namespace App\Manager;

use App\Entity\Booking;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Class BookingManager
 */
class BookingManager
{
    private $manager;

    public function __construct(EntityManagerInterface $manager)
    {
        $this->manager = $manager;
    }


    /**
     * @param Booking $booking
     */
    public function save(Booking $booking)
    {
        $this->manager->persist($booking);
        $this->manager->flush();
    }

}
