<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use  Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;

class ShipmentRequest extends FormRequest
{

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'sender'                       => 'required|array',
            'sender.full_name'             => 'required|string',
            'sender.address'               => 'required|string',
            'sender.phone'                 => 'required|string|numeric',

            'receiver'                     => 'required|array',
            'receiver.full_name'           => 'required|string',
            'receiver.address'             => 'required|string',
            'receiver.phone'               => 'required|string|numeric',

            'shipmentInfo'                 => 'required|array',
            'shipmentInfo.shipmentService' => 'required|string',
        ];
    }

    public function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(response()->json([
            'message' => 'Validation error',
            'details' => $validator->errors()->messages(),
        ], Response::HTTP_BAD_REQUEST));
    }
}
