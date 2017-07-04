<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public $table = "Admin";
    protected $primaryKey = "Admin_id";
    // protected $casts =["Admin_id"=>"varchar"];
    protected $fillable =['Admin_id','Admin_name','Admin_password'];

}
