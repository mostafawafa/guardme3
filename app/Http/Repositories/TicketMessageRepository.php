<?php

namespace Responsive\Http\Repositories;

use Responsive\TicketMessage;

class TicketMessageRepository
{
    public function create(array $data)
    {
        $result = TicketMessage::create($data);
        return $result->id;
    }
    public function getByTicketId($id)
    {
        return TicketMessage::with('files')->where('ticket_id', $id)->get();
    }
}