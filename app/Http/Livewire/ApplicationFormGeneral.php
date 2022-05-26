<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Application;

class ApplicationFormGeneral extends Component
{
    public $company_name;
    public $business_reg_no;
   

    public function render()
    {
        return view('livewire.application-form-general');
    }

    public function submit()
    {
        // dd($this);
        $validatedData = $this->validate([
            'company_name' => 'required',
            'business_reg_no' => 'required',
            
        ]);
   
        $application = Application::create($validatedData);
        
        dd($application);
        return redirect()->to('/form');
    }
}
