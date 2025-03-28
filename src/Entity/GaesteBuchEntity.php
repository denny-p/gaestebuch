<?php

namespace App\Entity;

use App\Repository\GaesteBuchEntityRepository;
use DateTimeImmutable;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: GaesteBuchEntityRepository::class)]
class GaesteBuchEntity
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $id = null;
    
    #[ORM\Column(type: "datetime_immutable",options:["default" => "CURRENT_TIMESTAMP"])]
    private DateTimeImmutable $createdAt;

    #[Assert\NotBlank]
    #[Assert\Length(max:255)]
    #[ORM\Column(type: "string",length: 255)]    
    private ?string $username = null;

    #[Assert\NotBlank]
    #[ORM\Column(type: "string",length: 255)] 
    private ?string $subtitle = null;

    #[Assert\NotBlank]
    #[ORM\Column(type: "text")]
    private ?string $body = null;

    #[Assert\Email]
    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    public function __construct(){
        $this->createdAt = new DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
        
    }

    public function getSubtitle(): ?string
    {
        return $this->subtitle;
    }

    public function setSubtitle(string $subtitle): void
    {
        $this->subtitle = $subtitle;
       
    }

    public function getBody(): ?string
    {
        return $this->body;
    }

    public function setBody(string $body): void
    {
        $this->body = $body;        
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
       
    }

    /**
     * Get the value of createdAt
     *
     * @return \DateTimeImmutable
     */
    public function getCreatedAt(): \DateTimeImmutable {
        return $this->createdAt;
    }

    /**
     * Set the value of createdAt
     *
     * @param \DateTimeImmutable $createdAt
     *
     * 
     */
    public function setCreatedAt(\DateTimeImmutable $createdAt): void {
        $this->createdAt = $createdAt;        
    }
}
