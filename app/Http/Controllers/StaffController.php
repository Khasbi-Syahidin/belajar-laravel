<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use Illuminate\Http\Request;
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
            'address' => 'string'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $staff = Staff::create([
            'name' => $request->name,
            'age' => $request->age,
            'phone' => $request->phone,
            'status' => $request->status,
            'gender' => $request->gender,
            'height' => $request->height,
            'weight' => $request->weight,
            'address' => $request->address
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
        $staff->update([
            'name' => $request->name,
            'age' => $request->age,
            'phone' => $request->phone,
            'status' => $request->status,
            'gender' => $request->gender,
            'height' => $request->height,
            'weight' => $request->weight,
            'address' => $request->address
        ]);
        return redirect()->route('staff.index')->with('success', 'Staff updated successfully');
    }
}
