<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Student extends Model  implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    use HasFactory;
   protected $primaryKey='reg_no';
   public $incrementing=false;
}
