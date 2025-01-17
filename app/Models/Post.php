<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  use HasFactory;
  protected $fillable = [
    'name',
    'URL',
    'user_id',
    'likes',
    'comments'
  ];
}
