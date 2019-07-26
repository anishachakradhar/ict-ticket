<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ticket;
use App\TicketPayment;
use App\Http\Requests\TicketRequest;
use Session;

class TicketController extends Controller
{
	public function index(){
		// dd(Session::all());
		return view('front.pages.ticket-order');
	}

    public function storeOrder(TicketRequest $request){
    	$id = $this->getLatestEntry();
        $userID = $this->getID($id, 'User');
        $ticketID = $this->getID($id, 'Ticket'); // should send one id as first parameter and second parameter as in which attribute
    	$order = Ticket::create(
    		[
    			'user_id' => $userID, //USER1
    			'ticket_id' => $ticketID,
    			'number_of_tickets' => $request['number_of_tickets'],
    			'name' => $request['name'],
    			'email' => $request['email'],
    			'phone' => $request['phone'],
    			'organization' => $request['organization'],
    			'is_primary' => 1
    		]
    	);


        $payment = TicketPayment::create(
            [
                'ticket_id' => $ticketID,
                'amount_paid' => 0,
                'transaction_id' => 0,
                'status' => 'unpaid'
            ]
        );

        if($order){
            Session::put('ticket_id', $ticketID);
            if(Session::get('ticket_id') != NULL){
                return redirect()->route('payment.index');
            }
        }

        return redirect()->route('ticket.index');

    }

    protected function getLatestEntry(){
    	$ticket = Ticket::latest('id')->get()->first();

    	if($ticket){
    		return $ticket->id+1;
    	}

    	return 1;
    }

    protected function getID($id, $attr){
        $column ='';
        switch ($attr) {
            case 'Ticket':
                $column = 'ticket_id';
                break;
            
            case 'User':
                $column = 'user_id';
                break;

            default:
                $column = '';
        }

        do{
            $gId = $attr.rand(1,10)*($id.date('dHis'));
            $flag = $this->isUnique($gId, $column);
            $id++;
        }while($flag);

        return $gId;
    }

    protected function isUnique($id, $column){
        $ticket = Ticket::where($column, $id)->get()->first();
        if($ticket){
            return true;
        }
        else
            return false;  
    }

    // protected function getTicketID($id){
    //     do{
    //         $ticketID = 'Ticket'.$id*rand(1,15);
    //         $flag = $this->isUniqueTicketID($ticketID);
    //     }while($flag);
    // }

    // protected function isUniqueTicketID($ticketID){
    //     $ticket = Ticket::where('ticket_id', $ticketID)->get()->first();
    //     if($ticket)
    //         return true;
    //     else
    //         return false;  
    // }
}
