<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disposition extends Model
{
    protected $fillable = ['id_mail','mail_from','mail_to','description','mark'];
}
