<?php

namespace App\Http\Requests\Domain;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'server_id' => 'required|exists:servers,id',
            'user_id' => 'required|exists:users,id',
            'url' => 'required|string',
            'desc' => 'required|string',
            'jenis_aplikasi' => 'required|string',
            'port' => 'required|string',
            'http_status' => 'required|in:aktif,inactive',
            'images.*' => 'required|image|max:2048',
        ];
    }
}
