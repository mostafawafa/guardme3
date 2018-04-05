<?php

namespace Responsive\Http\Controllers;

use Illuminate\Http\Request;
use Responsive\Http\Controllers\Controller;
use Responsive\Http\Traits\MessageTrait;
use Responsive\Http\Repositories\TicketRepository;
use Responsive\Http\Repositories\TicketMessageRepository;
use Responsive\Http\Repositories\TicketFileMessageRepository;

class MessageController extends Controller
{
    use MessageTrait;
    private $ticket;
    private $ticketMessages;
    private $ticketFileMessage;
    public function __construct(
        TicketRepository $ticket,
        TicketMessageRepository $ticketMessages,
        TicketFileMessageRepository $ticketFileMessage)
    {
        $this->ticket = $ticket;
        $this->ticketMessages = $ticketMessages;
        $this->ticketFileMessage = $ticketFileMessage;
    }
    public function store(Request $request, $ticketId)
    {
        $errors = $this->messageStore($request, $ticketId);
        return back()->withInput()->with('errors', $errors);
    }
}