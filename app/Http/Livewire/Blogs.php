<?php

namespace App\Http\Livewire;

use App\Models\Blog;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class Blogs extends Component
{
    use AuthorizesRequests;
    public $Blogs;

    protected $listeners = ['saved' => '$refresh'];


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function authorize()
    {
        return true;
    }

    public function render()
    {

        $this->Blogs = Blog::all();
        return view('livewire.blogs');
    }
}
