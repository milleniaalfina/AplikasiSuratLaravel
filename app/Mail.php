<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mail extends Model
{
	protected $fillable = [
		'mail_code','mail_from','mail_to','mail_subject','description','file_name','id_type','mark'
	];

}
