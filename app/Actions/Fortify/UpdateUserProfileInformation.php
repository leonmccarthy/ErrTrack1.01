<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'my_photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:2048','dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000'],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ],[
            'my_photo.max'=>'Maximum size is 2 MB image',
            'my_photo.mimes'=>'Extensions allowed: jpg,png,jpeg',
            'my_photo.image'=>'File must be an image',
            'my_photo.dimensions'=>'Minimum width & height: 100, Maximum width & height: 1000'
        ])->validateWithBag('updateProfileInformation');


        // $request = request();
        // if(isset($input['my_photo'])){
        //     $previous_photo = Auth::user()->my_photo;
        //     // GETTING IMAGE NAME AND MOVING FILE
            
        //     $photo = $input['my_photo'];
        //     $photoname = time().".".$photo->getClientOriginalExtension();
        //     $photo->move("userPhotos", $photoname);
        // }else{
        //     $photoname = Auth::user()->my_photo;
        // }
        
        if(isset($input['my_photo'])){
            $user->updateMyPhoto($input['my_photo']);
        }
        

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'name' => $input['name'],
                'email' => $input['email'],
                // 'my_photo' => $photoname,
            ])->save();
            // if(isset($input['my_photo'])){
            //     Storage::disk('public')->delete("/{{ $previous_photo }}");
            // }
            
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
