<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
	protected $fillable = ['contact_heading','contact_text','contact_address','contact_phone','contact_mail','is_active'];
}
