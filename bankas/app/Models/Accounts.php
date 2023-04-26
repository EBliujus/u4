<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    use HasFactory;

    protected $fillable = ['iban', 'balance', 'client_id'];
    // public $timestamps = false;
    
    public function accClient() 
    {
        return $this->belogsTo(Client::class, 'client_id', 'id');
    }
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
