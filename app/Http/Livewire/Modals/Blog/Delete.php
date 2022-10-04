<?php

namespace App\Http\Livewire\Modals\Blog;

use App\Models\Blog;
use Livewire\Component;

class Delete extends Component
{
    public $data;
    public $show;

    protected $listeners = ['showDeleteModal' => 'showDeleteModal'];

    public $Blog,  $Blog_id;
    public function render()
    {
        return view('livewire.modals.blog.delete');
    }

    public function doClose()
    {
        $this->show = false;
    }

    public function showDeleteModal($data)
    {
        $this->show = true;
        $Blog = Blog::findOrFail($data);
        $this->Blog_id = $Blog->id;
    }

    public function deleteBlog()
    {
        Blog::where('id',  $this->Blog_id)->delete();
        $this->doClose();
        $this->dispatchBrowserEvent('load-page', ['page' => 'blogs']);
        $this->emit('saved');
        $this->show_blog = false;
        $this->dispatchBrowserEvent(
            'alert',
            ['type' => 'success',  'message' => 'Blog Deleted Successfully.']
        );
    }
}
