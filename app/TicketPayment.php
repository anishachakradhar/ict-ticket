<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketPayment extends Model
{
    protected $fillable = [
    	'ticket_id','amount_paid','transaction_id','status'
    ];
}
