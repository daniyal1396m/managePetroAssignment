<?php

    namespace App\Http\Requests\Admin;

    use Illuminate\Foundation\Http\FormRequest;

    class StoreOrderRequest extends FormRequest
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
         * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
         */
        public function rules(): array
        {
            return ['client_id' => 'required|exists:clients,id', 'truck_id' => 'required|exists:trucks,id', 'address_id_from' => 'required|exists:addresses,id', 'address_id_to' => 'required|exists:addresses,id'];
        }
    }
