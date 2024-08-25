<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors = User::where('role_id', '!=', 3)->get();
        return view('admin.doctor.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.doctor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateStore($request);

        $data             = $request->all();
        $name             = (new User)->userAvatar($request);

        $data['image']     = $name;
        $data['password'] = bcrypt($request->password);

        User::create($data);

        return redirect()->back()->with('message', 'Doctor added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctor = User::find($id);
        return view('admin.doctor.delete', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctor = User::find($id);
        return view('admin.doctor.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validateUpdate($request, $id);

        $data           = $request->all();
        $doctor         = User::find($id);
        $imageName      = $doctor->image;
        $doctorPassword = $doctor->password;

        if ($request->hasFile('image')) {
            $imageName  = (new User)->userAvatar($request);
            $doctor->image ? unlink(public_path('images/' . $doctor->image)) : '';
        }

        $data['image']  =   $imageName;

        if ($request->password) {
            $data['password']    = bcrypt($request->password);
        } else {
            $data['password']    = $doctorPassword;
        }

        $doctor->update($data);

        return redirect()->route('doctor.index')->with('message', 'Doctor updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::id() == $id) {
            abort(401);
        }
        $doctor        = User::find($id);
        $doctorDelete  = $doctor->delete();
        if ($doctorDelete) {
            unlink(public_path('images/' . $doctor->image));
        }

        return redirect()->route('doctor.index')->with('message', 'Doctor deleted successfully');
    }

    public function validateStore($request)
    {
        return $this->validate($request, [
            'name'           => 'required',
            'email'          => 'required|unique:users',
            'password'       => 'required|min:6|max:25',
            'gender'         => 'required',
            'education'      => 'required',
            'address'        => 'required',
            'department'     => 'required',
            'phone_number'   => 'required|numeric',
            'image'          => 'required|mimes:jpeg,jpg,png',
            'role_id'        => 'required',
            'description'    => 'required',
        ]);
    }

    public function validateUpdate($request, $id)
    {
        return $this->validate($request, [
            'name'           => 'required',
            'email'          => 'required|unique:users,email,' . $id,
            'gender'         => 'required',
            'education'      => 'required',
            'address'        => 'required',
            'department'     => 'required',
            'phone_number'   => 'required|numeric',
            'image'          => 'mimes:jpeg,jpg,png',
            'role_id'        => 'required',
            'description'    => 'required',
        ]);
    }
}
