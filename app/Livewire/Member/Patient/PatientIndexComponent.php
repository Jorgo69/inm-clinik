<?php

namespace App\Livewire\Member\Patient;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class PatientIndexComponent extends Component
{
    use WithPagination;
    
    public $clinicId, $search = '';

    public function mount($clinicId)
    {
        $this->clinicId = $clinicId;
    }

    public function render()
    {
        $query = User::where('role', 'patient')
                ->where(function($query) {
                    $query->where('name', 'like', '%'. $this->search  .'%')
                    ->orWhere('firstname', 'like', '%'. $this->search . '%');
                })
                        ->orderByDesc('created_at');

        $patients = $query->get();
                        
        return view('livewire.member.patient.patient-index-component', [
            'patients' => $patients,
        ]);
    }
}
