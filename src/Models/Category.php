<?php

namespace App\Models;

class Category
{
    private int $category_id;
    private string $category_title;
    private string $category_desc;
    private int $creator_id;
    private int $moderator_id;
    private bool $active;
    private \DateTime $createdAt;
    private \DateTime $updatedAt;

    public function __construct(int $category_id, string $category_title, string $category_desc, int $creator_id, int $moderator_id, bool $active, \DateTime $createdAt, \DateTime $updatedAt)
    {
        $this->category_id = $category_id;
        $this->category_title = $category_title;
        $this->category_desc = $category_desc;
        $this->creator_id = $creator_id;
        $this->moderator_id = $moderator_id;
        $this->active = $active;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->category_id;
    }

    /**
     * @return string
     */
    public function getCategoryTitle(): string
    {
        return $this->category_title;
    }

    /**
     * @return string
     */
    public function getCategoryDesc(): string
    {
        return $this->category_desc;
    }

    /**
     * @return int
     */
    public function getCreatorId(): int
    {
        return $this->creator_id;
    }

    /**
     * @return int
     */
    public function getModeratorId(): int
    {
        return $this->moderator_id;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updatedAt;
    }
}