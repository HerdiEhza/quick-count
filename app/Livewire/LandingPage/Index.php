<?php

namespace App\Livewire\LandingPage;

use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Index extends Component
{
    #[Layout('components.layouts.landing-page')]
    public function render()
    {
        $getPost = Http::get('https://newsapi.org/v2/everything?q=pemilu 2024&from=2023-10-28&pageSize=6&sortBy=publishedAt&apiKey=574bb1d394344ae2bcc8fc6848db4c81');
        // $getPost = Http::get('https://newsapi.org/v2/top-headlines?country=id&category=politic&apiKey=574bb1d394344ae2bcc8fc6848db4c81');
        $posts = json_decode($getPost);

        return view('livewire.landing-page.index', [
            'posts' => $posts,
        ]);
    }
}
