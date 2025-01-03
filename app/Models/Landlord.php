<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Landlord extends Authenticatable
{
    use HasFactory, Notifiable; // Ensure the Notifiable trait is used

    protected $table = 'landlord';

    protected $primaryKey = 'landlord_id';

    protected $fillable = [
        'name', 'email', 'phone', 'password', 'picture', 'account_type', 'current_address'
    ];



}

