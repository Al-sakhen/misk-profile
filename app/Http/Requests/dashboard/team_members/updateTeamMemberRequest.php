<?php

namespace App\Http\Requests\dashboard\team_members;

use Illuminate\Foundation\Http\FormRequest;

class updateTeamMemberRequest extends FormRequest
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
            'name'          => 'required',
            'position'      => 'required | min:3 | max:60',
            'image'         => 'mimes:jpeg,png,jpg,gif,svg | max:2048',
            'description'   => 'required | min:3 | max:200',
        ];
    }
}
