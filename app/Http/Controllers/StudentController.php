<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Auth;
use Illuminate\Support\Facades\Crypt;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
	$user=@Auth::user();
        if($user->hasPermissionTo("view_students"))
        {
	$students=Student::all();
        return view("students.index",["students"=>$students]);
        }
        else
        {
            abort("403","You are not authorised to view students");
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
	$user=@Auth::user();
        if($user->hasPermissionTo("add_student"))
        {
        return view("students.create");
        }
        else
        {
            abort("403","You are not authorised to add a new student");
        }

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
	$user=@Auth::user();
        if($user->hasPermissionTo("save_student"))
        {
	$full_name=$request->input("full_name");
	$regno=$request->input("reg_no");
	$mobile_number=$request->input("mobile_number");
	$email=$request->input("email");

        $request->validate([
	"full_name"    => ['required','regex:/^[a-zA-Z\s\-\']+$/u'],
	"reg_no"=>['required','unique:students','regex:/([a-zA-Z]{1}[0-9]{2}[a-zA-Z][\/][0-9]{4,5}[\/][0-9]{4} | [a-zA-Z]{1}[0-9]{2}[\/][0-9]{4,5}[\/][0-9]{4} | [a-zA-Z]{1}[0-9]{2}[\/][a-zA-Z]{2,3}[\/][0-9]{4}[\/][0-9]{4} | [a-zA-Z]{1}[0-9]{2}[a-zA-Z][\/][a-zA-Z]{2,3}[\/][0-9]{4,5}[\/][0-9]{4}|[a-zA-Z]{1}[0-9]{2}[\/][a-zA-Z]{2,3}[\/][a-zA-Z]{2,3}[\/][0-9]{4,5}[\/][0-9]{4}|[a-zA-Z]{1}[0-9]{2}[a-zA-Z][\/][a-zA-Z]{2,3}[\/][a-zA-Z]{2,3}[\/][0-9]{4,5}[\/][0-9]{4})/ixm'],
	"mobile_number"    => ['required','numeric'],
        "email"    => ['required','email','ends_with:@students.ku.ac.ke','unique:students'],
	]);

	$student=new Student();
	$student->full_name=$full_name;
	$student->reg_no=$regno;
	$student->mobile_number=$mobile_number;
	$student->email=$email;
	$student->save();
	return redirect("students/create")->with("alert-success","Student was registered successfully. ");
	}
        else
        {
            abort("403","You are not authorised to add a new student");
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       //$student_id=Crypt::decryptString($id);
	//$student=Student::findOrFail(Crypt::decryptString($id));
	echo "ID is ".Crypt::decryptString($id);
	return Crypt::decryptString($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
	$user=@Auth::user();
        if($user->hasPermissionTo("edit_student"))
        {
	$student=Student::findOrFail(Crypt::decryptString($id));
	return view("students.edit",["student"=>$student]);
	}
        else
        {
            abort("403","You are not authorised to edit a student's entry");
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
	$user=@Auth::user();
        if($user->hasPermissionTo("edit_student"))
        {
	$full_name=$request->input("full_name");
	$regno=$request->input("reg_no");
	$mobile_number=$request->input("mobile_number");
	$email=$request->input("email");

        $request->validate([
	"full_name"    => ['required','regex:/^[a-zA-Z\s\-\']+$/u'],
	"reg_no"=>['required','unique:students','regex:/([a-zA-Z]{1}[0-9]{2}[a-zA-Z][\/][0-9]{4,5}[\/][0-9]{4} | [a-zA-Z]{1}[0-9]{2}[\/][0-9]{4,5}[\/][0-9]{4} | [a-zA-Z]{1}[0-9]{2}[\/][a-zA-Z]{2,3}[\/][0-9]{4}[\/][0-9]{4} | [a-zA-Z]{1}[0-9]{2}[a-zA-Z][\/][a-zA-Z]{2,3}[\/][0-9]{4,5}[\/][0-9]{4}|[a-zA-Z]{1}[0-9]{2}[\/][a-zA-Z]{2,3}[\/][a-zA-Z]{2,3}[\/][0-9]{4,5}[\/][0-9]{4}|[a-zA-Z]{1}[0-9]{2}[a-zA-Z][\/][a-zA-Z]{2,3}[\/][a-zA-Z]{2,3}[\/][0-9]{4,5}[\/][0-9]{4})/ixm'],
	"mobile_number"    => ['required','numeric'],
        "email"    => ['required','email','ends_with:@students.ku.ac.ke'],
	]);

	$student=Student::findOrFail(Crypt::decryptString($id));
	$student->full_name=$full_name;
	$student->reg_no=$regno;
	$student->mobile_number=$mobile_number;
	$student->email=$email;
	$student->save();
	return redirect("students")->with("alert-success","Student particulars were updated successfully. ");
	}
        else
        {
            abort("403","You are not authorised to edit a student's particulars");
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
	$user=@Auth::user();
        if($user->hasPermissionTo("delete_student"))
        {
	$student=Student::findOrFail($id);
	$student->delete();
	return redirect("students")->with("alert-success","Student entry was removed successfully. ");
	}
        else
        {
            abort("403","You are not authorised to delete a student entry");
        }

    }
}
