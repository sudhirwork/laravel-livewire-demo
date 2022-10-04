<?php

namespace App\Http\Livewire\Modals\Blog;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Create extends Component
{
    use WithFileUploads;
    public $show;
    public $Blogs, $title, $description, $feature_image, $Blog_id, $filename;

    public function render()
    {
        return view('livewire.modals.blog.create');
    }

    protected $listeners = ['showCreateModal' => 'showCreateModal'];

    private function resetInputFields()
    {
        $this->title = '';
        $this->description = '';
        $this->feature_image = null;
        $this->filename = null;
    }

    public function mount()
    {
        $this->show = false;
        // return view('livewire.blogs');
    }

    public function showCreateModal()
    {
        $this->show = true;
    }

    public function doClose()
    {
        $this->resetInputFields();
        $this->show = false;
    }

    public function addBlog()
    {
        // Do Something With Your Modal
        $validatedData = $this->validate([
            'title' => 'required',
            'description' => 'required',
            'feature_image' => 'nullable|max:1000|mimes:jpg,png,jpeg',
        ]);

        $this->filename =  $this->feature_image->getClientOriginalName();


        $validatedData['feature_image'] = $this->feature_image->storeAs('blog-images', $this->filename, 'public');

        Blog::create([
            'feature_image' => $this->filename,
            'title' => $this->title,
            'description' => $this->description,
            'slug' => Str::slug($this->title),
        ]);

        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Blog Created Successfully.']
        );

        $this->dispatchBrowserEvent('load-page', ['page' => 'blogcrud']);

        $this->resetInputFields();
        $this->Blogs = Blog::all();

        // Close Modal After Logic
        $this->doClose();
    }
}
