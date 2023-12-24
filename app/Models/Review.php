<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    public function book() {
          return $this->belongsTo(Book::class);
    }
    // the above function is needed to define one to many relationship
    // review belongs to book
}
