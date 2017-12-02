<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\VisitorRepository")
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
     * @ORM\Firstname
     * @ORM\GeneratedValue
     * @ORM\Column(type="string")
     */
    private $firstname;

    /**
     * @ORM\Birthday
     * @ORM\GeneratedValue
     * @ORM\Column(type="string")
     */
    private $birthday;

    /**
     * @ORM\Age
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $age;


}
