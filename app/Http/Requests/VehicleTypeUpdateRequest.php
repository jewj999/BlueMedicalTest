<?php

namespace App\Http\Requests;

use App\Enums\CutOffDateAction;
use App\Enums\ExitRecordAction;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class VehicleTypeUpdateRequest extends FormRequest
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
        return [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:255',
            'cut_off_date_action' => [
                'required',
                'string',
                new Enum(CutOffDateAction::class)
            ],
            'exit_record_action' => [
                'required',
                'string',
                new Enum(ExitRecordAction::class)
            ],
            'price_per_minute' => 'required|numeric|min:0',
        ];
    }
}
