<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AdminReviewStageSelectedinterview extends Component
{
    
    protected $listeners = ['scoreinterview'];
    public function render()
    {
        return view('livewire.admin-review-stage-selectedinterview');
    }

    public function scoreinterview()
    {
       $this->emit('scoreinterview_main');
    }
}
