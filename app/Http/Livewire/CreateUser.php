<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CreateUser extends Component
{
    public $name;
    public $email;
    public $password;
    public $passwordAgain;
    public $role;

    public $userID;
    public $createMode = false;

    public function mount($p_userId)
    {
        if ($p_userId == NULL) {
            $this->createMode = true;
        }

        if (!$this->createMode) {

            $this->userID = $p_userId;
            $user = User::find($p_userId);

            $this->name = $user->name;
            $this->email = $user->email;
            // dd($user->roles[0]->id);
            $this->role = $user->roles[0]->id ?? NULL;
        }
    }


    public function render()
    {
        return view('livewire.create-user');
    }

    public function createUser()
    {



        if ($this->createMode) {
            $passwordRules = ['required', 'string', 'max:20', 'same:password'];
        } else {
            $passwordRules = ['nullable', 'string', 'max:20', 'same:password'];
        }

        if ($this->createMode) {
            $email_a1 = 'unique:users';
        } else {
            $email_a1 = Rule::unique('users')->ignoreModel(User::find($this->userID));
        }



        $this->validate(
            [
                'name' => ['required', 'string', 'max:50'],
                'email' => ['required', 'string', 'email', 'max:50', $email_a1],
                'password' => $passwordRules,

            ],
            [
                'name.required' => 'Please fill :attribute',
                'name.string' => 'Only characters allowed',
                'name.max' => 'Your character must less than 50',

                'email.required' => 'Please fill :attribute',
                'email.string' => 'Only characters allowed',
                'email.max' => 'Your character must less than 50',
                'email.unique' => 'Your email is already being use',

                'password.required' => 'Please fill :attribute',
                'password.string' => 'Only characters allowed',
                'password.max' => 'Your character must less than 50',
                'password.same' => 'Your password is not match',

            ],
            [
                'name' => 'Name',
                'email' => 'Email',
                'password' => 'Password',

            ]
        );

        if (!$this->createMode) {

            $user = User::where('id', $this->userID)->update(
                [
                    'name' => $this->name,
                    'email' => $this->email,
                    // 'password' => Hash::make($this->password),
                ]
            );

            $user = User::find($this->userID);
            // dd($user);
            $user->roles()->detach();
        } else {
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);
        }
        $user->assignRole($this->role);
    }
}
