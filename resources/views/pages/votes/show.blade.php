<?php

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use App\Models\Vote;

new
#[Layout('components.layouts.app')]
#[Title('Vote')]
class extends Component
{
    public Vote $vote;

    public function mount(Vote $vote): void
    {
        $this->vote = $vote;
    }

    public function delete(): void
    {
        $this->vote->delete();

        session()->flash('success', 'Vote deleted successfully.');
        $this->redirectRoute('votes.index');
    }

    public function incrementVote(): void
    {
        $this->vote->increment('nombre_de_vote');
    }

    public function decrementVote(): void
    {
        if ($this->vote->nombre_de_vote > 0) {
            $this->vote->decrement('nombre_de_vote');
        }
    }
};
?>

<div class="mx-auto max-w-4xl space-y-6 px-4 py-8 sm:px-6 lg:px-8">
    <div class="space-y-2">
        <flux:text>
            <a href="/votes" class="text-zinc-500 hover:text-zinc-800 dark:hover:text-white">Votes</a>
            / Vote
        </flux:text>
        <flux:heading size="xl">Vote</flux:heading>
        <flux:text>Details and information.</flux:text>
    </div>

    <flux:card class="space-y-6">
        <div class="space-y-2">
        <flux:subheading>Titre</flux:subheading>
        <flux:text>
            @if(filled($vote->titre))
                {{ $vote->titre }}
            @else
                <span class="text-zinc-400">—</span>
            @endif
        </flux:text>
    </div>

    <div class="space-y-2">
        <flux:subheading>Nombre De Vote</flux:subheading>
        <div class="flex items-center gap-3">
            <flux:text>
                @if(filled($vote->nombre_de_vote))
                    {{ $vote->nombre_de_vote }}
                @else
                    <span class="text-zinc-400">—</span>
                @endif
            </flux:text>
            <flux:button.group>
                <flux:button size="sm" variant="subtle" wire:click="incrementVote">+</flux:button>
                <flux:button size="sm" variant="subtle" wire:click="decrementVote">−</flux:button>
            </flux:button.group>
        </div>
    </div>

    <div class="space-y-2">
        <flux:subheading>Photo</flux:subheading>
        <div>
            @if($vote->photo)
                @if(Str::endsWith($vote->photo, ['.jpg', '.jpeg', '.png', '.gif', '.webp']))
                    <img src="{{ asset('storage/' . $vote->photo) }}" class="max-h-56 rounded-xl object-cover" />
                @elseif(Str::endsWith($vote->photo, ['.mp4', '.mov', '.avi', '.webm', '.mkv']))
                    <video src="{{ asset('storage/' . $vote->photo) }}" class="max-h-56 rounded-xl object-cover" controls preload="metadata"></video>
                @else
                    <flux:button variant="ghost" href="{{ asset('storage/' . $vote->photo) }}" target="_blank">{{ basename($vote->photo) }}</flux:button>
                @endif
            @else
                <span class="text-zinc-400">—</span>
            @endif
        </div>
    </div>
    </flux:card>

    <div class="flex flex-col gap-3 sm:flex-row sm:justify-end">
        <flux:button href="{{ route('votes.edit', $vote) }}" variant="primary">Edit</flux:button>
        <flux:button
            variant="danger"
            wire:click="delete"
            wire:confirm="Are you sure you want to delete this Vote?"
        >
            Delete
        </flux:button>
        <flux:button href="/votes" variant="ghost">Back to List</flux:button>
    </div>
</div>
