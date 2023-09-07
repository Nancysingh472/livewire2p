<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\fcategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Symfony\Component\HttpKernel\Profiler\Profile;

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

    public function insert(Request $request)
    {
        $request->validate([
            'category' => 'required'
            
        ]);
        $res = fcategory::insert([
            'category' => $request->category,
           
        ]);
       if ($res) {
        session()->flash('success', 'operation successful');
    } else {
        session()->flash('fail', 'operation fail');
    }
    return Redirect::back();

    }
    public function editcategory($id)
    {
        $fcategory = fcategory::find($id);
        return view('master.editcategory', compact('fcategory'));
    }

    public function updatecategory(Request $request,$id)
    {
        $fcategory = fcategory::find($id);
        $fcategory->category = $request->input('category');
        $fcategory->update();
        return redirect('category');
    }
    public function deleted($id)
    {
        $fcategory = fcategory::find($id);
        $fcategory->delete();
        return redirect('category');
    }

    public function category(){
        // $users=User::all();
        $users = DB::table('fcategories')->select('id','category')->get();

        return view('master.category')->with('users', $users);
    }
    public function models(){
        // $users=User::all();
        $users = DB::table('fmodels')->select('id','models')->get();

        return view('master.models')->with('users', $users);
    }
    public function make(){
        // $users=User::all();
        $users = DB::table('fmakes')->select('id','make')->get();

        return view('master.make')->with('users', $users);
    }

}
