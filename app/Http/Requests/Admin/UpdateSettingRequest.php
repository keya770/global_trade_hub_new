<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
{
     public function authorize(): bool { return auth()->user()?->is_admin === true; }
    public function rules(): array {
        return [
            'site_name' => 'required|string|max:100',
            'phone'     => 'nullable|string|max:50',
            'email'     => 'nullable|email',
            'address'   => 'nullable|string|max:255',
            'facebook'  => 'nullable|url',
            'instagram' => 'nullable|url',
            'linkedin'  => 'nullable|url',
        ];
    }
}
