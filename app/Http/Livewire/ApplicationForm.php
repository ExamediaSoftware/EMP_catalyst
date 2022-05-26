<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Application;

class ApplicationForm extends Component
{
    public $name;
    public $email;
    public $body;
   
    public function submit()
    {
        dd($this);
        $validatedData = $this->validate([
            'name' => 'required|min:6',
            'email' => 'required|email',
            'body' => 'required',
        ]);
   
        Application::create($validatedData);
   
        return redirect()->to('/form');
    }

    public function render()
    {
        return view('livewire.application-form');
    }
}
