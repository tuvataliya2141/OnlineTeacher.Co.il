<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SendMessage extends Model
{
    public $table = 'tbl_sent_message_notifications';

    public $fillable = [
        "message",
        "tokens"
    ];
}
