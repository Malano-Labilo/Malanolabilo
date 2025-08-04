<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     * 
     * @param \Illuminate\Http\Request $request
    * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {   
        $validatedData = $request->validated(); // Validasi data yang diterima dari request

        // if($request->hasFile('avatar')){
        //     if(!empty($request->user()->avatar)){
        //         Storage::disk('public')->delete($request->user()->avatar);
        //     }
        //     $validatedData['avatar'] = $request->file('avatar')->store('img/avatar', 'public');
        // }

        if($request->avatar){
            if(!empty($request->user()->avatar)){
                Storage::disk('public')->delete($request->user()->avatar);
            }
            $newFileName = Str::after($request->avatar, 'tmp/');
            
            Storage::disk('public')->move($request->avatar, "img/$newFileName");
            $validatedData['avatar'] = "img/$newFileName";
        }

        $request->user()->update($validatedData);

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function uploadAvatar(Request $request){
        if($request->hasFile('avatar')){
            $request->file('avatar')->store('img/avatar', 'public');
        }
        return response()->json(['error' => 'No file uploaded'], 400);
    }

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
