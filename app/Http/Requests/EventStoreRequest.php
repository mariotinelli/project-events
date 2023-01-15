<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EventStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'image' => ['required', 'image', 'mimes:png,jpg,jpeg,gif,webp'],
            'title' => ['required', 'string'],
            'date' => ['required', 'date_format:d/m/Y H:i:s'],
            'duration' => ['required', 'date_format:H:i:s'],
            'description' => ['required', 'string'],
            'address.zip_code' => ['required', 'max:8', 'min:8'],
            'address.street' => ['required'],
            'address.number' => ['required'],
            'address.district' => ['required'],
            'address.complement' => ['nullable'],
            'address.city' => ['required'],
            'address.state' => ['required']
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function messages()
    {
        return [
            'image.required' => 'É necessário inserir uma imagem para o evento.',
            'image.mimes' => 'É necessário inserir uma imagem nos formatos: png, jpg, jpeg, gif, webp.',
            'title.required' => 'É necessário inserir um título para o evento',
            'date.required' => 'É necessário inserir uma data para o evento',
            'duration.required' => 'É necessário inserir o tempo de duração do evento',
            'description.required' => 'É necessário inserir uma descrição para o evento',
            'address.zip_code.required' => 'É necessário inserir um cep para o evento',
            'address.street.required' => 'É necessário inserir o endereço do evento',
            'address.number.required' => 'É necessário inserir o número do endereço do evento',
            'address.district.required' => 'É necessário inserir o bairro do endereço do evento',
            'address.city.required' => 'É necessário inserir a cidade do evento',
            'address.state.required' => 'É necessário inserir o estado do evento',
        ];
    }
}
