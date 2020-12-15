<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Model\Note;

class NoteController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'note' => 'required',
        ]);
        $user_id = Auth::id();
        $request->request->add(['user_id' => $user_id]);
        Note::create($request->all());
        return redirect()->back(); //->action([TicketController::class, 'show']);
    }
}
