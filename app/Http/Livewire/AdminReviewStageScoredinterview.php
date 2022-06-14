<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AdminReviewStageScoredinterview extends Component
{
    protected $listeners = ['successfullcandidate'];
    
    public function render()
    {
        return view('livewire.admin-review-stage-scoredinterview');
    }

    public function successfullcandidate()
    {
        $this->emitUp('successfullcandidate_main');
    }
    
}
