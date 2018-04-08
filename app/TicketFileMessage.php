<?php

namespace Responsive;

use Illuminate\Database\Eloquent\Model;

class TicketFileMessage extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'ticket_id', 'message_id', 'name',
    ];
}