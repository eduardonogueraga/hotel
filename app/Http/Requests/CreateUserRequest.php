<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'=> ['required', 'string', 'min:2', 'max:20'],
            'email'=> ['required', 'email', 'unique:users,email'],
            'password'=> 'required',
            'phone_number'=> 'required|numeric',
            'description'=> ['required', 'string', 'min:2', 'max:1000'],
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function createUser()
    {

        User::create([
            'name'=> $this->name,
            'email'=> $this->email,
            'password'=>  bcrypt($this->password),
            'phone_number'=> $this->phone_number,
            'description'=> $this->description,
        ]);
    }
}
