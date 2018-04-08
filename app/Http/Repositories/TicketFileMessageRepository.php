<?php

namespace Responsive\Http\Repositories;

use Responsive\TicketFileMessage;

class TicketFileMessageRepository
{
    public function create(array $data)
    {
        $result = TicketFileMessage::create($data);
        return $result->id;
    }
    public function getByTicketId($id)
    {
        return TicketFileMessage::where('ticket_id', $id)->get();
    }
}