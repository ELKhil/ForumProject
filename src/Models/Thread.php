<?php

namespace App\Models;

class Thread
{
    private int $thread_id;
    private string $thread_title;
    private int $creator_id;
    private int $moderator_id;
    private int $category_id;
    private bool $active;
    private \DateTime $createdAt;
    private \DateTime $updatedAt;

    public function __construct(int $thread_id, string $thread_title, int $creator_id, int $moderator_id, int $category_id, bool $active, \DateTime $createdAt, \DateTime $updatedAt)
    {
        $this->thread_id = $thread_id;
        $this->thread_title = $thread_title;
        $this->creator_id = $creator_id;
        $this->moderator_id = $moderator_id;
        $this->category_id = $category_id;
        $this->active = $active;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return int
     */
    public function getThreadId(): int
    {
        return $this->thread_id;
    }

    /**
     * @return string
     */
    public function getThreadTitle(): string
    {
        return $this->thread_title;
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
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->category_id;
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