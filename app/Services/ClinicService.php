<?php
namespace App\Services;

use App\Models\Clinic;

class ClinicService
{
    public function ClinicIdService(int $id)
    {
        $clinicId = Clinic::find($id);
        // dd($clinicId);
        
        return $clinicId;
    }
}
