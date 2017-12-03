<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VisitorRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Visitor
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $firstname;

    /**
     * @ORM\Column(type="datetime")
     */
    private $birthday;

    /**
     * @ORM\Column(type="integer")
     */
    private $age;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Booking", inversedBy="visitors")
     * @ORM\JoinColumn(nullable=true)
     */
    private $booking;

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
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * @param mixed $firstname
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return mixed
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * @param mixed $birthday
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @ORM\PrePersist
     */
    public function setAge()
    {
        $now = new \DateTime("now");
        $year = $now->format("Y");
        $birthYear = $this->getBirthday()->format("Y");
        $this->age = $year - $birthYear;
    }

    /**
     * @return Booking
     */
    public function getBooking() :Booking
    {
        return $this->booking;
    }

    /**
     * @param mixed $booking
     */
    public function setBooking(Booking $booking)
    {
        $this->booking = $booking;
    }




}
