<?php

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use App\Models\Vote;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

new
#[Layout('components.layouts.app')]
#[Title('Vote')]
class extends Component
{
    use WithFileUploads;
    public Vote $vote;
    #[Validate('sometimes')]
    public string $titre;
    #[Validate('sometimes|integer')]
    public int $nombre_de_vote;
    #[Validate('sometimes|image|mimes:jpeg,png,jpg,gif,webp,svg,avif|max:2048')]
    public $photo;

    public function mount(Vote $vote): void
    {
        $this->vote = $vote;
        $this->titre = $vote->titre;
    $this->nombre_de_vote = $vote->nombre_de_vote;
    // File fields are not pre-filled for security
    }

    public function update(): void
    {
        $validated = $this->validate();

        if ($this->photo) {
            if ($this->vote->photo) {
                Storage::disk('public')->delete($this->vote->photo);
            }
            $validated['photo'] = $this->photo->store('votes', 'public');
        }

        $this->vote->update($validated);

        

        session()->flash('success', 'Vote updated successfully.');
        $this->redirectRoute('votes.index');
    }

    
};
?>

<div class="mx-auto max-w-3xl space-y-6 px-4 py-8 sm:px-6 lg:px-8">
    <div class="space-y-2">
        <flux:text>
            <a href="/votes" class="text-zinc-500 hover:text-zinc-800 dark:hover:text-white">Votes</a>
            / Edit
        </flux:text>
        <flux:heading size="xl">Edit Vote</flux:heading>
    </div>

    <form wire:submit="update" class="space-y-6">
        @csrf
        <flux:card class="space-y-6">
            <div class="space-y-2">
                    <flux:input type="text" wire:model="titre" label="Titre" />
                    @error('titre') <flux:text class="text-red-500">{{ $message }}</flux:text> @enderror
                </div>

<div class="space-y-2">
                    <flux:input type="text" wire:model="nombre_de_vote" label="Nombre De Vote" />
                    @error('nombre_de_vote') <flux:text class="text-red-500">{{ $message }}</flux:text> @enderror
                </div>

<div class="space-y-2">
                    <flux:input type="file" wire:model="photo" label="Photo" accept="image/*" />
                    @error('photo') <flux:text class="text-red-500">{{ $message }}</flux:text> @enderror
                </div>
        </flux:card>

        <div class="flex flex-col-reverse gap-3 sm:flex-row sm:justify-end">
            <flux:button href="/votes" variant="ghost">Cancel</flux:button>
            <flux:button type="submit" variant="primary">Update</flux:button>
        </div>
    </form>
</div>
