<?php

namespace App\Livewire;

use App\Models\DataBakalCalon;
use Livewire\Component;

class Detail extends Component
{
    public function render()
    {
        $bacalegs = DataBakalCalon::get();

        return view('livewire.detail', compact(
            'bacalegs',
        ));
    }
}
