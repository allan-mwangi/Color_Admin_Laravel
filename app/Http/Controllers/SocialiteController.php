<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class SocialiteController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

     public function handleGoogleCallback()
     {
        try {

            $user = Socialite::driver('google')->stateless()->user();
	 
        	$currentUser = User::where('email', $user->email)->first();
		$domain=strtolower(substr($user->email,strpos($user->email,"@")+1));
		if($domain!="ku.ac.ke" && $domain!="students.ku.ac.ke")
		{
		echo "<script>alert(`Invalid Corporate email(".$user->email.") was used to login with the domain ".$domain."\n\n Click OK to login using your corporate email`);location.href='/color_admin_laravel/public/index.php/';</script>";
		//abort (403,"Invalid Corporate email(".$user->email.") was used to login with the domain ".$domain."<br><br>Click <a href='https://zoezi.ku.ac.ke/color_admin_laravel/public/index.php'>here</a> to login using your corporate email");
		@header("Location: index.php");			
		return;
		}


            if($currentUser){
                Auth::login($currentUser);
                app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
                //$currentUser->revokePermissionsTo("View Bookings");
                session(['user_full_name'=>$user->name,'user_email_address'=>$user->email,"type_of_user"=>$user->type_of_user,"user_image"=>$user->avatar]);
                $user_permissions=$currentUser->user_permissions;
                echo "<br>User Permissions: ".$user_permissions;

                if(Str::contains($user_permissions,"save_student"))
                {
                    $currentUser->givePermissionTo("save_student");
                }
                if(Str::contains($user_permissions,"edit_student"))
                {
                    $currentUser->givePermissionTo("edit_student");                
                }
                if(Str::contains($user_permissions,"delete_student"))
                {
                    $currentUser->givePermissionTo("delete_student");                
                }
                if(Str::contains($user_permissions,"view_students"))
                {
                    $currentUser->givePermissionTo("view_students");                   
                }

                if(Str::contains($user_permissions,"save_user"))
                {
                    $currentUser->givePermissionTo("save_user");
                }
                if(Str::contains($user_permissions,"edit_user"))
                {
                    $currentUser->givePermissionTo("edit_user");
                }
                if(Str::contains($user_permissions,"delete_user"))
                {
                    $currentUser->givePermissionTo("delete_user");
                }
                if(Str::contains($user_permissions,"view_users"))
                {
                    $currentUser->givePermissionTo("view_users");
                }

		if(Str::contains($user_permissions,"view_audit_trail"))
		{
		$currentUser->givePermissionTo("view_audit_trail");
		}
		    
          return redirect("home");
	    }
        else
        {
	   $new_user=new User();
            $new_user->name=$user->name;
            $new_user->email=$user->email;
            $new_user->type_of_user='';
            $new_user->user_permissions="view_users,edit_user,view_audit_trail,save_student,edit_student,delete_student,view_students";
            $new_user->password="password";
            $new_user->save();
           session(['user_full_name'=>$user->name,'user_email_address'=>$user->email,"type_of_user"=>$user->type_of_user,"user_image"=>$user->avatar]);
	   Auth::login($new_user);
	   $new_user->givePermissionTo("view_users","edit_user","view_audit_trail","save_student","edit_student","delete_student","view_students");
            return redirect("home");
        }
	}
	catch (Exception $e) 
	{
	
	}
   }

}