<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
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

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        if($request->avatar){
            if(!empty($request->user()->avatar)) {
                // Hapus gambar lama jika ada
                Storage::disk('public')->delete($request->user()->avatar);
            }
            $avatarData = json_decode($request->avatar, true);
            $avatarPath = $avatarData['path'] ?? null;

            if ($avatarPath && Str::startsWith($avatarPath, 'tmp/avatar')) {
            $fileName = Str::after($avatarPath, 'tmp/avatar/');
            Storage::disk('public')->move($avatarPath, 'img/avatar/' . $fileName);
            $validatedData['avatar'] = 'img/avatar/' . $fileName;
    }
            // Storage::disk('public')->move($request->avatar, 'img/avatar/' . $pathImg); // Pindahkan file ke direktori yang diinginkan
            // $validatedData['avatar'] = 'img/avatar/' . $pathImg; // Simpan path gambar ke dalam Avatar 
        }
        $request->user()->update($validatedData);

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function uploadAvatar(Request $request)
    {
        if($request->hasFile('avatar')){
            $path = $request->file('avatar')->store('tmp/avatar', 'public'); //path img yang akan disimpan
            return response()->json(['path' => $path]);
        }
        return response()->json(['error' => 'No file uploaded'], 400);
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
