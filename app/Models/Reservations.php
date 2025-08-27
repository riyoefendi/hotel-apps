<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
    protected $fillable =
    [
        'guest_name',
        'guest_phone',
        'guest_email',
        'guest_room_number',
        'guest_note',
        'guest_checkin',
        'guest_checkout',
        'room_id',
        'payment_method',
        'reservation_number',
        'guest_status',
        'guets_id_card',
        'isOnline',
        'isReserve',
        'subtotal',
        'totalAmount',
    ];
}
