<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employeedata extends Model
{
    protected $table="employeedata";
    protected $fillable = ['emp_id','f_name','l_name','gender','skills','start_date','created_by','updated_by','created_at','updated_at'];
}
