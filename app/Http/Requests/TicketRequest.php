<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class TicketRequest extends FormRequest
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
     * @return array
     */
    public function rules(Request $request)
    {
        if($request->method()=='POST'){
            return [
                'number_of_tickets' => 'required|numeric',
                'name'  => 'required|string',
                'email' => 'required|email',
                'phone' => 'required|numeric',
                'organization'  => 'required|string'
            ];
        };

    }
}
