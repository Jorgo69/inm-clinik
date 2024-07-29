<?php

namespace App\Livewire\Member\Consultation;

use App\Models\ConsultationMedical;
use Livewire\Component;
use Livewire\WithPagination;

class ConsultationIndexComponent extends Component
{
    public $search;
    public $clinicId;
    public String $sortOrder = 'recent';
    use WithPagination;

    public function mount($clinicId)
    {
        $this->clinicId = $clinicId;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function setSortOrder($order)
    {
        $this->sortOrder = $order;
        $this->resetPage();
    }

    public function render()
    {
        
        $query = ConsultationMedical::where('clinic_id', $this->clinicId)
            ->where(function($query) {
                $query->whereHas('patient', function($subQuery) {
                    $subQuery->where('name', 'like', '%'. $this->search .'%')
                        ->orWhere('firstname', 'like', '%'. $this->search .'%');
                })
                ->orWhereHas('concerned', function($subQuery) {
                    $subQuery->where('name', 'like', '%'. $this->search .'%')
                        ->orWhere('firstname', 'like', '%'. $this->search .'%');
                });
        });

            // Apply sorting if needed
        if ($this->sortOrder == 'recent') {
            $query->orderBy('created_at', 'asc');
            } else {
                $query->orderBy('created_at', 'desc');
            }
                
        $consultations = $query->paginate(100);
                    
        
        return view('livewire.member.consultation.consultation-index-component', [
            'consultations' => $consultations,
        ]);
    }
}
