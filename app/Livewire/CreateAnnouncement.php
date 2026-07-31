<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;

class CreateAnnouncement extends Component
{

public string $title = '';

    public string $price = '';

    public string $description = '';

    public string $category_id = '';

    public $categories;


public function mount(): void
    {
        $this->categories = Category::orderBy('name')->get();
    }

    public function save(): void
    {
        $validated = $this->validate([
            'title' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'description' => ['required', 'string', 'min:10'],
            'category_id' => ['required', 'exists:categories,id'],
        ]);

        Announcement::create([
            'title' => $validated['title'],
            'price' => $validated['price'],
            'description' => $validated['description'],
            'category_id' => $validated['category_id'],
            'user_id' => Auth::id(),
        ]);

        $this->reset('title', 'price', 'description', 'category_id');
        session()->flash('success', 'Annuncio inserito correttamente.');
    }

    public function render()
    {
        return view('livewire.create-announcement');
    }
}
