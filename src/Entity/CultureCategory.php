<?php

namespace App\Entity;

use App\Repository\CultureCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CultureCategoryRepository::class)
 */
class CultureCategory
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity=Culture::class, mappedBy="culture_category")
     */
    private $culture;

    public function __construct()
    {
        $this->culture = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Culture[]
     */
    public function getCulture(): Collection
    {
        return $this->culture;
    }

    public function addCulture(Culture $culture): self
    {
        if (!$this->culture->contains($culture)) {
            $this->culture[] = $culture;
            $culture->addCultureCategory($this);
        }

        return $this;
    }

    public function removeCulture(Culture $culture): self
    {
        if ($this->culture->removeElement($culture)) {
            $culture->removeCultureCategory($this);
        }

        return $this;
    }
}
