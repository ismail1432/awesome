<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\BookingRepository")
 */
class Booking
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $bookingDate;

    /**
     * @ORM\Column(type="integer")
     */
    private $price;

    /**
     * @ORM\Column(type="integer")
     */
    private $totalVisitor;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Visitor", mappedBy="booking")
     * @ORM\JoinColumn(nullable=true)
     */
    private $visitors;

    public function __construct()
    {
        $this->visitors =  new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @return mixed
     */
    public function getBookingDate()
    {
        return $this->bookingDate;
    }

    /**
     * @param mixed $bookingDate
     */
    public function setBookingDate($bookingDate)
    {
        $this->bookingDate = $bookingDate;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getTotalVisitor()
    {
        return $this->totalVisitor;
    }

    public function addVisitor(Visitor $visitor)
    {
        $this->visitors[] = $visitor;

        $visitor->setBooking($this);
    }

    public function removeVisitor(Visitor $visitor)
    {
        $this->visitors->removeElement($visitor);

        $visitor->setBooking(null);
    }

    /**
     * @param mixed $totalVisitor
     */
    public function setTotalVisitor($totalVisitor)
    {
        $this->totalVisitor = $totalVisitor;
    }

    /**
     * @return ArrayCollection| Visitor[]
     */
    public function getVisitors()
    {
        return $this->visitors;
    }

    /**
     * @param mixed $visitors
     */
    public function setVisitors($visitors)
    {
        $this->visitors = $visitors;
    }


}
