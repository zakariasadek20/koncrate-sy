<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Serializer\Annotation\Groups;
/**
 * @ORM\Entity(repositoryClass="App\Repository\PostRepository")
 * ApiResource(
 *      itemOperations=(
 *                      "GET"={"normalization_context"={"groups"={"get-post-with-author"}}}
 *                      ,"PUT"={
 *                              "normalization_context"={"groups"={"get-post-with-author"}}
 *                              ,"denormalization_context"={"groups"={"put-post"}}
 *                          }
 *                      ,"DELETE"
 *              ),
 *      collectionOperations={
 *                              "GET"={"normalization_context"={"groups"={"get-post"}}  }
 *                              ,"POST"={"normalization_context"={"groups"={"get-post"} },
 *                                        "denormalization_context"={"groups"={"post-"} }  }
 *                          }
 * )
 */
class Post
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"get-post-with-author"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank
     * @Groups({"get-post-with-author","put-categorie","post_categorie"})
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank
     * @Groups({"get-post-with-author","put-categorie","post_categorie"})
     */
    private $excerpt;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank
     * @Groups({"get-post-with-author","put-categorie","post_categorie"})
     */
    private $body;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank
     * @Groups({"get-post-with-author","put-categorie","post_categorie"})
     */
    private $slug;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\NotBlank
     * @Groups({"get-post-with-author","put-categorie","post_categorie"})
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Categorie",inversedBy="posts")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"get-post-with-author","put-categorie","post_categorie"})
     */
    private $categorie;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User",inversedBy="posts")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"get-post-with-author","post_categorie"})
     */
    private $author;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getExcerpt(): ?string
    {
        return $this->excerpt;
    }

    public function setExcerpt(?string $excerpt): self
    {
        $this->excerpt = $excerpt;

        return $this;
    }

    public function getBody(): ?string
    {
        return $this->body;
    }

    public function setBody(?string $body): self
    {
        $this->body = $body;

        return $this;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(?string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getCategorie(): ?Categorie
    {
        return $this->categorie;
    }

    public function setCategorie(?Categorie $categorie): self
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getAuthor(): ?User
    {
        return $this->author;
    }

    public function setAuthor(?User $author): self
    {
        $this->author = $author;

        return $this;
    }
}
