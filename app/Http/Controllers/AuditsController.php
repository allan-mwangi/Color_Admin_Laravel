<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AuditModel;
use Auth;

class AuditsController extends Controller
{
   
    public function index()
    {
	$user=@Auth::user();
        if($user->hasPermissionTo("view_audit_trail"))
        {
	        $audits=AuditModel::with('user')->latest()->get();	
        	return view("audit_trail.index",["audits"=>$audits]);
	}
	else
	{
	abort("403","You are not authorised to view the audit trail");
	}
    }
}
