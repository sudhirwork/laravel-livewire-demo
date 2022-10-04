<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use Livewire\Component;

class Blogdetail extends Component
{
    public $blog, $slug;

    public function mount($slug)
    {
        // dd($slug);
        // dd(gettype($slug));
        $this->blog = Blog::where('slug', $slug)->first();
    }

    public function render()
    {
        return view('livewire.blogdetail')->layout('layouts.guest');
        // return view('blogdetail', [
        //     'slug' => $this->blog,
        // ]);
    }
}
