<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Paiement;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'password',
        'date_of_birth',
        'level',
        'total_amount'
    ];

     public function paiements()
    {
        return $this->hasMany(Paiement::class);
    }

}
