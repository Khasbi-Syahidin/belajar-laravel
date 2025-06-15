<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{

    public function index()
    {
        $staff = Staff::all();
        return view('staff.index', ['staffs' => $staff]);
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:2|max:50',
            'age' => 'required|integer',
            'phone' => 'integer',
            'status' => 'in:single,married',
            'gender' => 'in:male,female',
            'height' => 'integer',
            'weight' => 'integer',
            'address' => 'string',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if($request->file('avatar')){
            $path = $request->file('avatar')->store('staff', 'public');
        }
        $staff = Staff::create([
            'name' => $request->name,
            'age' => $request->age,
            'phone' => $request->phone,
            'status' => $request->status,
            'gender' => $request->gender,
            'height' => $request->height,
            'weight' => $request->weight,
            'address' => $request->address,
            'avatar' => $path,
        ]);

        if ($staff) {
            return redirect()->route('staff.create')->with('success', 'Staff created successfully');
        }
    }
    public function edit($id)
    {
        $staff = Staff::findOrFail($id);
        return view('staff.edit', ['staff' => $staff]);
    }

    public function update(Request $request, $id)
    {
        $staff = Staff::findOrFail($id);

        if($request->file('avatar')){
            if($staff->avatar){
                Storage::delete($staff->avatar);
            }
            $path = $request->file('avatar')->store('staff', 'public');
        }
        $staff->update([
            'name' => $request->name,
            'age' => $request->age,
            'phone' => $request->phone,
            'status' => $request->status,
            'gender' => $request->gender,
            'height' => $request->height,
            'weight' => $request->weight,
            'address' => $request->address,
            'avatar' => $path,
        ]);
        return redirect()->route('staff.index')->with('success', 'Staff updated successfully');
    }


    public function delete($id)
    {
        // dd($id);
        $staff = Staff::findOrFail($id);
        $staff->delete();
        return redirect()->route('staff.index')->with('success', 'Staff deleted successfully');
    }
}
