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
        $user = $request->user();
        //ambil data avatar lama
        $oldAvatar = $user->avatar;

        if ($request->avatar) {
            // Pengecekan apkah stringnya Valid 
            $avatarData = $request->avatar; // decode jadi array
            if (isset($avatarData)) {
                $path = $avatarData;
                if (!empty($request->user()->avatar)) {
                    Storage::disk('public')->delete($request->user()->avatar);
                }
                $newFileName = Str::after($path, 'tmp/avatar/');
                Storage::disk('public')->move($path, "img/avatar/" . $newFileName);
                $validatedData['avatar'] = "img/avatar/" . $newFileName;
            }
        } else {
            // Kalau kosong, biarkan avatar lama
            $validatedData['avatar'] = $oldAvatar;
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

    public function deleteAvatar(Request $request): JsonResponse
    {
        // FilePond akan mengirim nama/path file yang diupload
        $path = $request->input('path');
        if (!$path) {
            return response()->json(['error' => 'No file specified'], 400);
        }

        // Pastikan file ada di disk public
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
            return response()->json(['status' => 'success', 'message' => 'File deleted']);
        }

        return response()->json(['error' => 'File not found'], 404);
    }

    public function deleteTempAvatars(Request $request): JsonResponse
    {
        // Bisa datang sebagai JSON (opsi A) atau form-encoded (opsi B)
        $files = $request->input('files', []); // ['tmp/avatar/abc.jpg', ...]
        if (!is_array($files)) {
            return response()->json(['error' => 'Invalid payload'], 422);
        }
        foreach ($files as $path) {
            if (!is_string($path)) continue;
            // Demi keamanan: batasi hanya folder tmp/avatar
            if (!Str::startsWith($path, 'tmp/avatar')) continue;
            if (Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }
        }
        return response()->json(['ok' => true]);
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
