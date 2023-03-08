<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VehicleUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $vehicle = $this->route('vehicle');

        return [
            'vehicle_type_id' => [
                'required',
                Rule::exists('vehicle_types', 'id')->where(function ($query) {
                    $query->where('deleted_at', null);
                })
            ],
            'license_plate_number' => ['required', 'string', 'max:255', Rule::unique('vehicles')->ignore($vehicle->id)],
        ];
    }
}
