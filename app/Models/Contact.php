<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['name', 'email', 'phone', 'message', 'status'];

    //list of status; 0 = unread, 1 = read, 2 = pending, 3 = resolved
    public const STATUS = [
        0 => 'Unread',
        1 => 'Read',
        2 => 'Pending',
        3 => 'Resolved',
    ];

    //status class tailwind css
    public const STATUS_CLASSES = [
        0 => 'bg-white ',
        1 => 'bg-blue-100',
        2 => 'bg-red-100',
        3 => 'bg-green-100',
    ];

    //get status text
    public function getStatusTextAttribute()
    {
        //return text
        return self::STATUS[$this->status];
    }

    public function getStatusClassAttribute()
    {
        //return class
        return self::STATUS_CLASSES[$this->status];
    }


}
