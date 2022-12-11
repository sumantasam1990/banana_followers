<?php

namespace App\Http\Controllers;

use App\Interfaces\PaymentRepositoryInterface;
use App\Models\Support;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    private PaymentRepositoryInterface $paymentRepository;

    public function __construct(PaymentRepositoryInterface $paymentRepository)
    {
        $this->paymentRepository = $paymentRepository;
    }

    public function index()
    {

        return view('tickets.index', ['balance' => $this->paymentRepository->getPaymentBalanceByUserId(Auth::user()->id)]);
    }

    public function display()
    {
        $data = Ticket::where('user_id', Auth::user()->id)->paginate(10);

        return view('tickets.display', ['data' => $data, 'balance' => $this->paymentRepository->getPaymentBalanceByUserId(Auth::user()->id)]);
    }

    public function addTicket(Request $request)
    {
        $request->validate([
            'subject' => 'required|max:150',
            'msg' => 'required|max:500',
        ]);

        $ticket_no = 'TN_' . uniqid();

        $ticket = new Ticket;

        $ticket->user_id = Auth::user()->id;
        $ticket->ticket_no = $ticket_no;
        $ticket->subject = $request->subject;
        $ticket->save();

        $support = new Support;

        $support->ticket_id = $ticket->id;
        $support->message = $request->msg;
        $support->user_id = Auth::user()->id;
        $support->save();

        return redirect()->back()->with('msg', 'Successful! Your ticket no is ' . $ticket_no);
    }

    public function viewTicket(string $id)
    {
        $data = Support::with('ticket')->where('ticket_id', $id)->get();
        return view('tickets.view-ticket', ['tid' => $id, 'data' => $data, 'balance' => $this->paymentRepository->getPaymentBalanceByUserId(Auth::user()->id)]);
    }

    public function replyTicket(Request $request)
    {
        $request->validate([
            'msg' => 'required|max:500',
            'ticket_id' => 'required|exists:supports,ticket_id'
        ]);

        $support = new Support;

        $support->ticket_id = $request->ticket_id;
        $support->message = $request->msg;
        $support->user_id = Auth::user()->id;
        $support->save();

        return redirect()->back();

    }
}
