<?php

namespace App\Models;

class Security_Role
{
    private int $role_id;
    private string $role_label;
    private bool $active;

    public function __construct(int $role_id, string $role_label, bool $active )
    {
        $this->role_id = $role_id;
        $this->role_label = $role_label;
        $this->active = $active;
    }

    /**
     * @return int
     */
    public function getRoleId(): int
    {
        return $this->role_id;
    }

    /**
     * @return string
     */
    public function getRoleLabel(): string
    {
        return $this->role_label;
    }

    /**
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->active;
    }
}