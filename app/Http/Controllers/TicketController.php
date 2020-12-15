<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Ticket;
use App\Model\Status;
use App\Model\Note;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function index(){
        $tickets = Ticket::orderBy('created_at', 'desc')->get(); //$tickets = Ticket::all();
        return view('tickets.index', compact('tickets'));
    }

    public function create(){
        $user_id = Auth::id() ?? 0;
        return view('tickets.create',['user_id' => $user_id]);
    }

    public function show($id){
        $ticket = Ticket::find($id);
        $statuses = Status::all();
        $notes = Note::orderBy('created_at', 'desc')->where('Ticket_id', '=', $id)->get();
        $user_id = Auth::id();

        return view('tickets.details', compact('ticket','statuses','notes'),['user_id' => $user_id]);
    }

    public function update(Request $request){

        $ticket = Ticket::find($request->id);

        $ticket->status_id = $request->status_id;

        $ticket->save();

        return $this->index();
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'message' => 'required'
        ]);
        $request->request->add(['status_id' => 1]);

        $created = Ticket::create($request->all());
        return view('tickets.stored',['created_ticket' => $created]);
    }

}
