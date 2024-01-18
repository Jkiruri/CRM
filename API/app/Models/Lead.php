<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'status', 'email', 'company_id'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}