<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    use HasFactory;

protected $fillable = ['name', 'description', 'amount', 'company_id','contact_id'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }
}