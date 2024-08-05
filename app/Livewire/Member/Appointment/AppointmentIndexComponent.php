<?php

namespace App\Livewire\Member\Appointment;

use App\Models\Appointment;
use Livewire\Component;
use Livewire\WithPagination;

class AppointmentIndexComponent extends Component
{
    use WithPagination;

    public $clinicId;
    public $search = '';
    public $sortOrder = 'recent'; // Filtre par default

    public function mount($clinicId)
    {
        $this->clinicId = $clinicId;
    }

    public function updatingSearch()
    {
        // Réinitialise la pagination lorsque le terme de recherche est mis à jour
        $this->resetPage();
    }

    public function setSortOrder($order)
    {
        $this->sortOrder = $order;
        $this->resetPage();
    }

    public function render()
    {
        $query = Appointment::where('clinic_id', $this->clinicId)
            ->where(function($query) {
                $query->where('reason', 'like', '%' . $this->search . '%')
                      ->orWhere('date', 'like', '%' . $this->search . '%')
                      ->orWhereHas('patientAppointment', function($query) {
                          $query->where('name', 'like', '%' . $this->search . '%')
                                ->orWhere('firstname', 'like', '%' . $this->search . '%');
                      });
            });

        if ($this->sortOrder == 'recent') {
            $query->orderBy('created_at', 'desc');
        } else {
            $query->orderBy('created_at', 'asc');
        }

        $appointments = $query->paginate(2);

        return view('livewire.member.appointment.appointment-index-component', [
            'appointments' => $appointments,
        ]);
    }
}
