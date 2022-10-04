<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use Livewire\Component;

class Bloglist extends Component
{
    public $Blogs;

    public function render()
    {
        $this->Blogs = Blog::all();
        return view('livewire.bloglist')->layout('layouts.app');
    }
}
