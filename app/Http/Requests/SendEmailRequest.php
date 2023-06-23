<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class SendEmailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => [
                'required',
                function ($attribute, $value, $fail) {
                    $emails = array_map('trim', explode(',', $value));
                    $validator = Validator::make(['emails' => $emails], ['emails.*' => 'required|email']);
                    if ($validator->fails()) {
                        $fail('All email addresses must be valid.');
                    }
                },
            ],
            'cc' => [
                'nullable',
                function ($attribute, $value, $fail) {
                    $emails = array_map('trim', explode(',', $value));
                    $validator = Validator::make(['cc' => $emails], ['cc.*' => 'required|email']);
                    if ($validator->fails()) {
                        $fail('All cc email addresses must be valid.');
                    }
                },
            ],
            'bcc' => [
                'nullable',
                function ($attribute, $value, $fail) {
                    $emails = array_map('trim', explode(',', $value));
                    $validator = Validator::make(['bcc' => $emails], ['bcc.*' => 'required|email']);
                    if ($validator->fails()) {
                        $fail('All cc email addresses must be valid.');
                    }
                },
            ],
            'attachments' => 'required|array',
            'attachments.*' => 'file|mimes:pdf,doc,docx,xlsx,csv',
            'body' => 'nullable|string',
            'subject' => 'required|string',
        ];
    }
}
