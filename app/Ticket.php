<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
    	'user_id','ticket_id','number_of_tickets','name','email','phone','organization','is_primary'
    ];
}
