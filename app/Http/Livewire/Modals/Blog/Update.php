<?php

namespace App\Http\Livewire\Modals\Blog;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class Update extends Component
{
    public $data;
    public $show;

    public $Blog, $title, $description, $feature_image, $Blog_id, $filename, $currentImage;


    use WithFileUploads;

    public function render()
    {
        return view('livewire.modals.blog.update');
    }


    protected $listeners = ['showEditModal' => 'showEditModal'];


    private function resetInputFields()
    {
        $this->title = '';
        $this->description = '';
        $this->feature_image = null;
        $this->filename = null;
    }

    public function mount($data)
    {
        // dd($data);
        $this->data = $data;
        $this->show = false;
    }

    public function showEditModal($data)
    {
        $this->show = true;
        $Blog = Blog::findOrFail($data);
        // dd($Blog->feature_image);
        $this->Blog_id = $data;
        $this->title = $Blog->title;
        $this->description = $Blog->description;
        $this->feature_image = $Blog->feature_image;
        $this->filename =  $Blog->feature_image;
        $this->currentImage =  $Blog->feature_image_url;
    }

    public function doClose()
    {
        $this->show = false;
    }


    public function updateBlog()
    {
        $validatedData = $this->validate([
            'title' => 'required',
            'description' => 'required',
            'feature_image' => 'nullable|max:1000|mimes:jpg,png,jpeg',
        ]);

        $Blog = Blog::find($this->Blog_id);

        $filename =  $this->feature_image->getClientOriginalName();

        $validatedData['feature_image'] = $this->feature_image->storeAs('blog-images', $filename, 'public');

        $Blog->update([
            'title' => $this->title,
            'description' => $this->description,
            'feature_image'  => $filename,
            'slug' => Str::slug($this->title),
        ]);

        $this->resetInputFields();
        $this->dispatchBrowserEvent('load-page', ['page' => 'blogs']);

        $this->doClose();
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Blog Updated Successfully.']
        );
    }
}
