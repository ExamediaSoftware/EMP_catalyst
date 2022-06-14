<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AdminReviewStageScoredvideo extends Component
{
    protected $listeners = ['selectforinterview', 'rejectbeforeinterview'];
    
    public function render()
    {
        return view('livewire.admin-review-stage-scoredvideo');
    }

    public function selectforinterview()
    {
       $this->emit('selectforinterview_main');
    }

    public function rejectbeforeinterview()
    {
       $this->emit('rejectbeforeinterview_main');
    }
}
