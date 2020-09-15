<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseReport extends Model
{   
    // NOMBRE DE LA RELACION (expenses)
    public function expenses(){
        return $this->hasMany(Expense::class);
    }
    // use HasFactory;
}
