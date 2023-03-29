<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmployeeRequest;
use App\Models\Employee;
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function data(Request $request, $id)
    {
        if ($file = $request->file('image')) {
            $filename = date('dmY') . time() . '.' . $file->getClientOriginalExtension();

            $file->move(storage_path('app/public/employee_image'), $filename);
        }
        
        $user_update = Employee::findOrFail($id);
        $user_update->update([
            'Name' => $request->name??$user_update->name,
            'email' => $request->email??$user_update->email,
            'gender' => $request->status??$user_update->status,
            'skill' => json_encode($request->skill)??$user_update->skill,
            'image' => $filename??$user_update->image
        ]);
        return redirect()->back()->withMessage('Successfully Update');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:employees,email|max:255',
            'gender' => 'required',
            'skill' => 'required',
            'image' => 'required|image|max:1048', // maximum 2MB
        ]);
        // @dd($request->all());
        if ($file = $request->file('image')) {
            $filename = date('dmY') . time() . '.' . $file->getClientOriginalExtension();

            $file->move(storage_path('app/public/employee_image'), $filename);
        }
        $employees=new Employee();
        $employees->name=$request->name;
        $employees->email=$request->email;
        $employees->gender=$request->gender;
        $employees->skill=json_encode($request->skill);
        $employees->image=$filename;
        $employees->save();
        return redirect()->back()->withMessage('Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        Employee::findOrFail($id)->delete();
        return redirect()->back()->withMessage('Successfully Deleted');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $employees=Employee::latest()->get();
        // $user_update = Employee::findOrFail($id)->get();
        $user_update = Employee::where('id', $id)->get();

       return view('AssessmentForm',compact('user_update','employees'));
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
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'gender' => 'required',
            'skill' => 'required',
            'image' => 'max:1048', // maximum 2MB
        ]);
        if ($file = $request->file('image')) {
            $filename = date('dmY') . time() . '.' . $file->getClientOriginalExtension();

            $file->move(storage_path('app/public/employee_image'), $filename);
        }

        
        $user_update1 = Employee::where('id', $id)->get();
        $user_update = Employee::where('id', $id);
        $user_update->update([
            'Name' => $request->name??$user_update1->name,
            'email' => $request->email??$user_update1->email,
            'gender' => $request->gender??$user_update1->gender,
            'skill' => json_encode($request->skill)??$user_update1->skill,
            'image' => $filename??$request->oldimage
        ]);
        return redirect('/')->withMessage('Successfully Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
       
        Employee::findOrFail($id)->delete();
        return redirect()->back()->withMessage('Successfully Deleted');
    }
}
