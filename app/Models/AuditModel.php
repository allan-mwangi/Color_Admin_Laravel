<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditModel extends Model
{
    protected $table="audits";
    use HasFactory;
	
    public function user()
    {
    return $this->belongsTo(User::class, 'user_id'); // Assuming the column is 'user_id'
    }

}
