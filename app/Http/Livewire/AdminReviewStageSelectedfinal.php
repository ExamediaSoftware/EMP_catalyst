<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AdminReviewStageSelectedfinal extends Component
{
    protected $listeners = ['verify'];

    public function render()
    {
        return view('livewire.admin-review-stage-selectedfinal');
    }

    public function verify()
    {
        $this->emitUp('verify_main');
    }
}
