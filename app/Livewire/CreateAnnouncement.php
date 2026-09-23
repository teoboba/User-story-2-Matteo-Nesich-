<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use App\Models\Announcement;
use Illuminate\Support\Facades\Auth;
use App\Jobs\ResizeImage;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use App\Jobs\GoogleVisionSafeSearch;
use App\Jobs\GoogleVisionLabelImage;


class CreateAnnouncement extends Component
{

use WithFileUploads;

public $images = [];
public $temporary_images = [];

public string $title = '';

    public string $price = '';

    public string $description = '';

    public string $category_id = '';

    public $categories;


public function updatedTemporaryImages(): void
    {

        if ($this->validate([
            'temporary_images.*' => 'image|max:1024',
            'temporary_images' => 'max:6',
        ])) {
            foreach ($this->temporary_images as $image) {
                $this->images[] = $image;
            }
        }
    }



    public function removeImage(int $key): void
    {
        if (isset($this->images[$key])) {
            unset($this->images[$key]);
            $this->images = array_values($this->images);
        }
    }

    protected function cleanForm()
{
    $this->title = '';
    $this->description = '';
    $this->category_id = '';
    $this->price = '';
    $this->images = [];
    $this->temporary_images = [];
}




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

        $announcement = Announcement::create([
            'title' => $validated['title'],
            'price' => $validated['price'],
            'description' => $validated['description'],
            'category_id' => $validated['category_id'],
            'user_id' => Auth::id(),
        ]);

    if (count($this->images) > 0) {
    foreach ($this->images as $image) {
        $newFileName = "announcements/{$announcement->id}";

        $newImage = $announcement->images()->create([
            'path' => $image->store($newFileName, 'public'),
        ]);

        dispatch(new ResizeImage($newImage->path, 300, 300));
        dispatch(new GoogleVisionSafeSearch($newImage->id));
        dispatch(new GoogleVisionLabelImage($newImage->id));
    }

    File::deleteDirectory(storage_path('/app/livewire-tmp'));
}



session()->flash('success', 'Annuncio inserito correttamente.');
$this->cleanForm();




    }



    public function render()
    {
        return view('livewire.create-announcement');
    }
}
