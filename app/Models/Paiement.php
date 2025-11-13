<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiement extends Model
{
    //
    use HasFactory;

    protected $table = 'paiements';

    protected $fillable = [
        'amount',
        'method',
        'payment_date',
        'student_id',
    ];

        public function student()
    {
        return $this->belongsTo(Student::class);
    }

}
