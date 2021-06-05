<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'=> ['required', 'string', 'min:2', 'max:20'],
            'email'=> ['required', 'email', 'unique:users,email,'.$this->user->id],
            'password'=> 'nullable',
            'phone_number'=> 'required|numeric',
            'description'=> ['required', 'string', 'min:2', 'max:1000'],
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function updateUser(User $user)
    {
        $user->fill([
            'name'=> $this->name,
            'email'=> $this->email,
            'phone_number'=> $this->phone_number,
            'description'=> $this->description,
        ]);

        if ($this->password != null) {
            $user->password = bcrypt($this->password);
        }

        $user->save();
    }
}
