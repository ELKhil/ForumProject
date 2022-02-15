<?php

namespace App\Models;

class Post
{

    private int $post_id;
    private string $post_content;
    private int $creator_id;
    private int $receiver_id;
    private int $thread_id;
    private bool $active;
    private \DateTime $createdAt;
    private \DateTime $updatedAt;

    public function __construct(int $post_id, string $post_content, int $creator_id, int $receiver_id, int $thread_id, bool $active, \DateTime $createdAt, \DateTime $updatedAt)
    {
        $this->post_id = $post_id;
        $this->post_content = $post_content;
        $this->creator_id = $creator_id;
        $this->receiver_id = $receiver_id;
        $this->thread_id = $thread_id;
        $this->active = $active;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
    }

    /**
     * @return int
     */
    public function getPostId(): int
    {
        return $this->post_id;
    }


    /**
     * @return string
     */
    public function getPostContent(): string
    {
        return $this->post_content;
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
    public function getReceiverId(): int
    {
        return $this->receiver_id;
    }

    /**
     * @return int
     */
    public function getThreadId(): int
    {
        return $this->thread_id;
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