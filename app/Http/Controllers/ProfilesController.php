<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Profile;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;

class ProfilesController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request)
    {
        if(Profile::where('user_id','=',Auth::user()->id)->exists()){
            $profiles = Profile::where('user_id','=',Auth::user()->id)->get();
            foreach($profiles as $profile){
                $profile = $profile;
            }
        }else{
            $profile = null;
        }
        
        return view('profile.index',compact('profile'));
    }

    public function store(Request $request){
        $userId = Auth::user()->id;
        $data = [
            'name' => $request->name,
            'user_id' => $userId,
            'phone_number' => $request->nomerTelephone,
            'address' => $request->address
        ];
        
        try{
            Profile::create($data);
            Alert::success('Berhasil','Berhasil menyimpan profile');
            return redirect()->route('profile.edit');
        }catch(\Exception $e){
            Alert::error('Gagal','Gagal menyimpan profile');
        }
    }
    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
