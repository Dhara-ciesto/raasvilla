<?php

namespace App\Models;

use App\Models\Register;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Member_Register extends Model
{
    use HasFactory;
    protected $table = 'reg_members';
    protected $guarded = [];


    public function Parent()
    {
        return $this->belongsTo(Register::class, 'reg_id');
    }
}
