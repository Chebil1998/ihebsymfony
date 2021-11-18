<?php

namespace App\Entity;

use App\Repository\JobRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=JobRepository::class)
 */
class Job
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="text")
     */
    private $company;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isactivated;

    /**
     * @ORM\Column(type="datetime")
     */
    private $expiresat;

    /**
     * @ORM\OneToOne(targetEntity=Image::class, inversedBy="job", cascade={"persist", "remove"})
     */
    private $image;

    // /**
    //  * @ORM\Column(type="string", length=255)
    //  */
    // private $email;

   
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getCompany(): ?string
    {
        return $this->company;
    }

    public function setCompany(string $company): self
    {
        $this->company = $company;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getIsactivated(): ?bool
    {
        return $this->isactivated;
    }

    public function setIsactivated(bool $isactivated): self
    {
        $this->isactivated = $isactivated;

        return $this;
    }

    public function getExpiresat(): ?\DateTimeInterface
    {
        return $this->expiresat;
    }

    public function setExpiresat(\DateTimeInterface $expiresat): self
    {
        $this->expiresat = $expiresat;

        return $this;
    }

    // public function getEmail(): ?string
    // {
    //     return $this->email;
    // }

    // public function setEmail(string $email): self
    // {
    //     $this->email = $email;

    //     return $this;
    // }

    public function getImage(): ?Image
    {
        return $this->image;
    }

    public function setImage(?Image $image): self
    {
        $this->image = $image;

        return $this;
    }

  
}
