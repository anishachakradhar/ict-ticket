<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ticket;
use App\TicketPayment;

use Session; 

class PaymentController extends Controller
{
    public function paymentIndex(){

    	if(Session::get('ticket_id') == Null){
    		return redirect()->route('ticket.index');
    	}

    	if(!$this->checkValidTicketID(Session::get('ticket_id')))
    		return redirect()->route('ticket.index');

    	dd(Session::get('ticket_id'));
    	return 'This is payment Index';
    }

    protected function checkValidTicketID($ticketID){
    	$ticket = Ticket::where('ticket_id', $ticketID)->get()->first();
    	if($ticket){
    		return true;
    	}else{
    		return false;
    	}
    }


}
