<?php
namespace App\Services;

use App\Models\Clinic;

class ClinicService
{
    public function ClinicIdService($id)
    {
        $clinicId = Clinic::find($id);
        // dd($clinicId);
                
        return $clinicId;
    }
}
