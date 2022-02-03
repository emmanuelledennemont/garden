<?php

namespace App\Entity;

use App\Entity\Culture;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\CultureRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity(repositoryClass=CultureRepository::class)
 */
class Culture
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
     * @ORM\Column(type="string", length=255)
     */
    private $text;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $poster;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $family;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cycle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $exposition;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $ground;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $slug;

    /**
     * @ORM\ManyToMany(targetEntity=CultureCategory::class, inversedBy="culture")
     */
    private $culture_category;

    /**
     * @ORM\ManyToMany(targetEntity=Calendar::class)
     */
    private $calendar;

    public function __construct()
    {
        $this->culture_category = new ArrayCollection();
        $this->calendar = new ArrayCollection();
    }

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

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }

    public function getPoster(): ?string
    {
        return $this->poster;
    }

    public function setPoster(string $poster): self
    {
        $this->poster = $poster;

        return $this;
    }

    public function getFamily(): ?string
    {
        return $this->family;
    }

    public function setFamily(string $family): self
    {
        $this->family = $family;

        return $this;
    }

    public function getCycle(): ?string
    {
        return $this->cycle;
    }

    public function setCycle(string $cycle): self
    {
        $this->cycle = $cycle;

        return $this;
    }

    public function getExposition(): ?string
    {
        return $this->exposition;
    }

    public function setExposition(string $exposition): self
    {
        $this->exposition = $exposition;

        return $this;
    }

    public function getGround(): ?string
    {
        return $this->ground;
    }

    public function setGround(string $ground): self
    {
        $this->ground = $ground;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * @return Collection|CultureCategory[]
     */
    public function getCultureCategory(): Collection
    {
        return $this->culture_category;
    }

    public function addCultureCategory(CultureCategory $cultureCategory): self
    {
        if (!$this->culture_category->contains($cultureCategory)) {
            $this->culture_category[] = $cultureCategory;
        }

        return $this;
    }

    public function removeCultureCategory(CultureCategory $cultureCategory): self
    {
        $this->culture_category->removeElement($cultureCategory);

        return $this;
    }

    /**
     * @return Collection|Calendar[]
     */
    public function getCalendar(): Collection
    {
        return $this->calendar;
    }

    public function addCalendar(Calendar $calendar): self
    {
        if (!$this->calendar->contains($calendar)) {
            $this->calendar[] = $calendar;
        }

        return $this;
    }

    public function removeCalendar(Calendar $calendar): self
    {
        $this->calendar->removeElement($calendar);

        return $this;
    }
}
