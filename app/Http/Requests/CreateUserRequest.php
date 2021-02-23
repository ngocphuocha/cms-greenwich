<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
  public function rules()
  {
    return [
      'email' => ['required', 'email', 'unique:users,email'],
      'name' => ['required', 'min:5', 'max:25'],
      'password' => ['required', 'confirmed', 'numeric', 'min:6'],
    ];
  }
  public function messages()
  {
    return [];
  }
}
