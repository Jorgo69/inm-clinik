<?php

namespace App\Livewire\Member\Doctor;

use App\Models\ConsultationMedical;
use Livewire\Component;
use Livewire\WithPagination;

class ConsultationIndexComponent extends Component
{
    use WithPagination;
    public $clinicId, $search = '';
    public $consultationsId;


    public function mount($clinicId)
    {
        $this->clinicId = $clinicId;
    }

    public function initializeConsultationsId($consultationsId)
    {
        $this->consultationsId = $consultationsId;
    }

    public function deleteConsultation()
    {
        dd($this->consultationsId);
    }
    public function updatingSearch()
    {
        // Réinitialise la pagination lorsque le terme de recherche est mis à jour
        $this->resetPage();
    }

    public function render()
    {
        $query = ConsultationMedical::where('concerned_id', auth()->user()->id)
                                    ->where(function($query) {
                                        $query->whereHas('patient', function($subQuery) {
                                            $subQuery->where('name', 'like', '%'. $this->search .'%')
                                                    ->orWhere('firstname', 'like', '%'. $this->search .'%' )
                                                    ->orWhere('email', 'like', '%'. $this->search .'%' );
                                        });
                                    });
        ;

        $consultations = $query->paginate(1);

        return view('livewire.member.doctor.consultation-index-component', [
            'myConsultations' => $consultations,
        ]);
    }
}
