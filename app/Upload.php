<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Upload extends Model
{
    protected $table = "uploads";
    protected $primarykey = "id_upload";

    protected $guarded = ['created_at','updated_at'];
}
