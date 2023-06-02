<?php

namespace App\Actions\Fortify;

use App\Models\Resturant;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        $name=request()->is('resturant/*')?'resturants':'users';
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255',request()->is('resturant/*')?Rule::unique(Resturant::class,'name'):Rule::unique(User::class,'name')],
            'email' => ['required','string','email','max:255',request()->is('resturant/*')?Rule::unique(Resturant::class,'email'):Rule::unique(User::class,'email'),],
            'password' => $this->passwordRules(),
            request()->is('resturant/*')?'img':''=>[request()->is('resturant/*')?'required':'', 'max:255'],
            'mobile'=>['required', 'max:255'],
            'telephone'=>[request()->is('resturant/*')?'required':''],
            'description'=>[request()->is('resturant/*')?'required':'']
        ])->validate();
        
         if(request()->is('resturant/*')){
            $nameFile=$input['img']->getClientOriginalName();
            $file=$input['img']->storeAs('attachments/confirm/',$nameFile,'public');
            $resturant=Resturant::create([
                'name' => $input['name'],
                'email' => $input['email'],
                'confirm' => $file,
                'mobile' => $input['mobile'],
                'telephone' => $input['telephone'],
                'description' => $input['description'],
                'address' => $input['address'],
                'password' => Hash::make($input['password']),
            ]);
            return $resturant;
        }else{ 
         $user=User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'mobile' => $input['mobile'],
            'password' => Hash::make($input['password']),
        ]);
        return $user;
    }

        
        
    
    } 
}
