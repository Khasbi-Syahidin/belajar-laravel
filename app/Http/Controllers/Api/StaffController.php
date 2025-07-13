<?php

namespace App\Http\Controllers\Api;

use App\Models\Staff;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\StaffResource;

class StaffController extends Controller
{
    public function index(Request $request)
    {
        $staffs = Staff::all();
        $datas = StaffResource::collection($staffs);
        return response()->json($datas);
    }


    public function find($key)
    {
        try{
            $staff = Staff::findOrFail($key);
            return response()->json([
                'data' => $staff
            ]);
        } catch (\Throwable $e){
            return response()->json([
                'message' => 'terdapat kesalahan'
            ]);
        }
    }

    public function create(Request $request)
    {
        // $request->validate([
        //     'name' => 'string|min:2|max:3'
        // ]);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:2|max:50',
            // 'age' => 'required|integer',
            // 'phone' => 'integer',
            // 'status' => 'in:single,married',
            // 'gender' => 'in:male,female',
            // 'height' => 'integer',
            // 'weight' => 'integer',
            // 'address' => 'string',
            // 'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

         if ($validator->fails()) {
            return response()->json([
                'message' => $validator->messages()
            ]);
        }

        Staff::create([
            'name' => $request->name
        ]);
        return response()->json([
            'message' => 'Success'
        ]);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:2|max:50',
            'age' => 'required|integer',
            // 'phone' => 'integer',
            // 'status' => 'in:single,married',
            // 'gender' => 'in:male,female',
            // 'height' => 'integer',
            // 'weight' => 'integer',
            // 'address' => 'string',
            // 'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

         if ($validator->fails()) {
            return response()->json([
                'message' => $validator->messages()
            ]);
        }

        $staff = Staff::findOrFail($id);

        // if ($request->file('avatar')) {
        //     if ($staff->avatar) {
        //         Storage::delete($staff->avatar);
        //     }
        //     $path = $request->file('avatar')->store('staff', 'public');
        //     $staff->avatar = $path;
        //     $staff->save();
        // }
        $staff->update([
            'name' => $request->name,
            'age' => $request->age,
            // 'phone' => $request->phone,
            // 'status' => $request->status,
            // 'gender' => $request->gender,
            // 'height' => $request->height,
            // 'weight' => $request->weight,
            // 'address' => $request->address,
        ]);
        return response()->json([
            'message' => 'Success Update data staff'
        ]);
    }

    public function delete($id)
    {
        $staff = Staff::findOrfail($id);

        $staff->delete();

        return response()->json([
            'message'=> 'Success delete staff'
        ]);
    }
}
