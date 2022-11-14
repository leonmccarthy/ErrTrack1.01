<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

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
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'my_photo' => ['required', 'image','mimes:jpg,png,jpeg','max:2048','dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ],[
            'my_photo.max'=>'Maximum size is 2 MB image',
            'my_photo.mimes'=>'Extensions allowed: jpg,png,jpeg',
            'my_photo.image'=>'File must be an image',
            'my_photo.dimensions'=>'Minimum width & height: 100, Maximum width & height: 1000'
        ])->validate();

        $request = request();
        $photo = $request->file('my_photo');
        $photoname = time().".".$photo->getClientOriginalExtension();
        $photo->move("storage/userPhotos", $photoname);
        $photopath = "storage/userPhotos/".$photoname;

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'my_photo' => $photopath,
            'password' => Hash::make($input['password']),
        ]);
    }
}
