<?php

namespace App\Policies;

use App\Models\Vote;

class VotePolicy
{
    /**
     * Determine if the given policy authorizes the user to view any.
     */
    public function viewAny(): bool
    {
        return true;
    }

    /**
     * Determine if the given policy authorizes the user to view.
     */
    public function view(Vote $vote): bool
    {
        return true;
    }

    /**
     * Determine if the given policy authorizes the user to create.
     */
    public function create(): bool
    {
        return true;
    }

    /**
     * Determine if the given policy authorizes the user to update.
     */
    public function update(Vote $vote): bool
    {
        return true;
    }

    /**
     * Determine if the given policy authorizes the user to delete.
     */
    public function delete(Vote $vote): bool
    {
        return true;
    }

    /**
     * Determine if the given policy authorizes the user to restore.
     */
    public function restore(Vote $vote): bool
    {
        return true;
    }
    /**
     * Determine if the given policy authorizes the user to force delete.
     */
    public function forceDelete(Vote $vote): bool
    {
        return true;
    }
}
