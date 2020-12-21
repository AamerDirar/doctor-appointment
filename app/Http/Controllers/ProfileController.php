<?php

namespace App\Http\Controllers;

use App\Prescription;
use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.index');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name'              => 'required',
            'address'           => 'required',
            'phone_number'      => 'required',
            'gender'            => 'required',
            'description'       => 'required',
        ]);

        User::where('id', auth()->user()->id)->update($request->except('_token'));

        return redirect()->back()->with('message', 'Profile updated');
    }

    public function profilePic(Request $request)
    {
        $this->validate($request, ['file' => 'required|image|mimes:png,jpg,jpeg']);

        if ($request->hasFile('file')) {
            $image       = $request->file('file');
            $name        = time() . '.' . $image->getClientOriginalExtension();
            $destination = public_path('/profile');
            $image->move($destination, $name);
            $user        = User::where('id', auth()->user()->id)->update(['image' => $name]);

            return redirect()->back()->with('message', 'Profile image updated');
        }
    }

    public function myPrescription()
    {
        $prescriptions = Prescription::where('user_id', auth()->user()->id)->get();
        return view('my-prescription', compact('prescriptions'));
    }
}
