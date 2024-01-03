<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chatbots extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slogan', 'description', 'image', 'link'];
}
