<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services'; // Define the table name

    protected $fillable = [
        'picture',
        'type',
        'cost',
        'description',
    ];

    public function serviceRequests()
    {
        return $this->hasMany(ServiceRequest::class);
    }

}
