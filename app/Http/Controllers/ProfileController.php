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

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        if ($request->avatar) {
            // Pengecekan apkah stringnya Valid JSON
            $avatarData = json_decode($request->avatar, true); // decode jadi array
            if (isset($avatarData['path'])) {
                $path = $avatarData['path'];
                if (!empty($request->user()->avatar)) {
                    Storage::disk('public')->delete($request->user()->avatar);
                }
                $newFileName = Str::after($path, 'tmp/avatar/');
                Storage::disk('public')->move($path, "img/avatar/" . $newFileName);
                $validatedData['avatar'] = "img/avatar/" . $newFileName;
            }
        }

        $request->user()->update($validatedData);
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function uploadAvatar(Request $request)
    {
        if ($request->hasFile('avatar')) {
            $path = $request->file('avatar')->store('tmp/avatar', 'public');
            return response()->json(['path' => $path], 200);
        }
        return response()->json(['error' => 'No file uploaded'], 400);
    }

    public function deleteTempAvatar(Request $request)
    {
        $path = $request->input('path');
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
            return response()->json(['deleted' => true]);
        }
        return response()->json(['deleted' => false]);
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
