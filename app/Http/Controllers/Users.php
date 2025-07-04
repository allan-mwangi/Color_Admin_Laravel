<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Auth;

class Users extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user=@Auth::user();
        if($user->hasPermissionTo("view_users"))
        {
        $users=User::all();
        return view("users.index",["users"=>$users]);
        }
        else
        {
            abort("403","You are not authorised to view users");
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user=@Auth::user();
        if($user->hasPermissionTo("save_user"))
        {
        return view("users.create");
        }
        else
        {
            abort("403","You are not authorised to add a new user");
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user=@Auth::user();
        if($user->hasPermissionTo("save_user"))
        {
        $full_name=$request->input("full_name");
        $staff_email=$request->input("staff_email");
        $type_of_user=$request->input("type_of_user");
        //$permissions=implode(',',$request->input("permissions",[]));
	
	$permissions=[];
	if($request->has("save_student"))
	{
	$permissions[]="save_student";
	}
	if($request->has("edit_student"))
	{
	$permissions[]="edit_student";
	}

	if($request->has("delete_student"))
	{
	$permissions[]="delete_student";
	}
	if($request->has("view_student"))
	{
	$permissions[]="view_students";
	}

	if($request->has("save_users"))
	{
	$permissions[]="save_users";
	}
	
	if($request->has("edit_users"))
	{
	$permissions[]="edit_users";
	}

	if($request->has("delete_users"))
	{
	$permissions[]="delete_user";
	}

	if($request->has("view_users"))
	{
	$permissions[]="view_users";
	}

	if($request->has("view_audit_trail"))
	{
	$permissions[]="view_audit_trail";
	}	
        

        
        $request->validate(
            [
                "full_name"    => ['required','regex:/^[a-zA-Z\s\-\']+$/u'],
                "staff_email"    => ['required','email','ends_with:@ku.ac.ke'],
            ]
            );

            $user=new User();
            $user->name=$full_name;
            $user->email=$staff_email;
            $user->user_permissions=implode(',',$permissions);
            $user->password="password";
            $user->save();
            return redirect("users")->with("alert-success","User was added successfully");
        }
        else
        {
            abort("403","You are not authorised to add a new user");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user=@Auth::user();
        if($user->hasPermissionTo("view_users"))
        {
        $user=User::findOrFail(Crypt::decryptString($id));
        return $user;
        }
        else
        {
            abort("403","You are not authorised to view users");
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user=@Auth::user();
        if($user->hasPermissionTo("edit_user"))
        {
        $user=User::findOrFail(Crypt::decryptString($id));
        return view("users.edit",["user"=>$user]);
        }
        else
        {
            abort("403","You are not authorised to edit users");
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user=@Auth::user();
        if($user->hasPermissionTo("edit_user"))
        {
        $full_name=$request->input("full_name");
        $staff_email=$request->input("staff_email");
	//$permissions=implode(',',$request->input("permissions",[]));
	$permissions=[];
	if($request->has("save_student"))
	{
	$permissions[]="save_student";
	}
	if($request->has("edit_student"))
	{
	$permissions[]="edit_student";
	}

	if($request->has("delete_student"))
	{
	$permissions[]="delete_student";
	}
	if($request->has("view_student"))
	{
	$permissions[]="view_student";
	}

	if($request->has("save_users"))
	{
	$permissions[]="save_users";
	}
	
	if($request->has("edit_users"))
	{
	$permissions[]="edit_users";
	}

	if($request->has("delete_users"))
	{
	$permissions[]="delete_users";
	}

	if($request->has("view_users"))
	{
	$permissions[]="view_users";
	}

	if($request->has("view_audit_trail"))
	{
	$permissions[]="view_audit_trail";
	}	
        
        $request->validate(
            [
                "full_name"    => ['required','regex:/^[a-zA-Z\s\-\']+$/u'],
                "staff_email"    => ['required','email','ends_with:@ku.ac.ke'],
            ]
            );

            $user=User::findOrFail(Crypt::decryptstring($id));
            $user->name=$full_name;
            $user->email=$staff_email;
            $user->user_permissions=implode(',',$permissions);
            $user->password="password";
            $user->save();
            return redirect("users")->with("alert-success","User was updated successfully");
        }
            else
        {
            abort("403","You are not authorised to edit users");
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user=@Auth::user();
        if($user->hasPermissionTo("delete_user"))
        {
            $user=User::findOrFail(Crypt::decryptstring($id));
            $name=$user->name;
            $email=$user->email;
            $user->delete();
            return redirect("users")->with("alert-success",$name." was successfully deleted from the system");
        }
        else
        {
            abort("403","You are not authorised to delete users");
        }
    }

    function logout()
    { 
        app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();       
        Auth::logout();
        return redirect(url("/"));
    }
}