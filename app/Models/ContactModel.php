<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactModel extends Model
{
    //   
    protected $table ='contact';
    protected $primaryKey = 'contact_id';
    protected $fillable = [
        'email'
    ];
}
