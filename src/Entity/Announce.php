<?php

namespace App\Entity;

use App\Repository\AnnounceRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AnnounceRepository::class)
 */
class Announce
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $departure;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $departure_address;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $arrival;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $arrival_address;

    /**
     * @ORM\Column(type="date")
     */
    private $departure_date;

    /**
     * @ORM\Column(type="time")
     */
    private $departure_time;

    /**
     * @ORM\Column(type="time")
     */
    private $arrival_time;

    /**
     * @ORM\Column(type="integer")
     */
    private $place;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime")
     */
    private $updated_at;

    /**
     * @ORM\ManyToOne(targetEntity=Car::class, inversedBy="announces", cascade={"persist"})
     */
    private $car;

    public function __construct()
    {
        $this->created_at = new \DateTime();
        $this->updated_at = $this->created_at;
    }
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDeparture(): ?string
    {
        return $this->departure;
    }

    public function setDeparture(string $departure): self
    {
        $this->departure = $departure;

        return $this;
    }

    public function getDepartureAddress(): ?string
    {
        return $this->departure_address;
    }

    public function setDepartureAddress(string $departure_address): self
    {
        $this->departure_address = $departure_address;

        return $this;
    }

    public function getArrival(): ?string
    {
        return $this->arrival;
    }

    public function setArrival(string $arrival): self
    {
        $this->arrival = $arrival;

        return $this;
    }

    public function getArrivalAddress(): ?string
    {
        return $this->arrival_address;
    }

    public function setArrivalAddress(string $arrival_address): self
    {
        $this->arrival_address = $arrival_address;

        return $this;
    }

    public function getDepartureDate(): ?\DateTimeInterface
    {
        return $this->departure_date;
    }

    public function setDepartureDate(\DateTimeInterface $departure_date): self
    {
        $this->departure_date = $departure_date;

        return $this;
    }

    public function getDepartureTime(): ?\DateTimeInterface
    {
        return $this->departure_time;
    }

    public function setDepartureTime(\DateTimeInterface $departure_time): self
    {
        $this->departure_time = $departure_time;

        return $this;
    }

    public function getArrivalTime(): ?\DateTimeInterface
    {
        return $this->arrival_time;
    }

    public function setArrivalTime(\DateTimeInterface $arrival_time): self
    {
        $this->arrival_time = $arrival_time;

        return $this;
    }

    public function getPlace(): ?int
    {
        return $this->place;
    }

    public function setPlace(int $place): self
    {
        $this->place = $place;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    public function getCar(): ?Car
    {
        return $this->car;
    }

    public function setCar(?Car $car): self
    {
        $this->car = $car;

        return $this;
    }

}
