<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class reservation extends Model
{
    protected $fillable = ['arrival','booking_number','stat','user','slug'];

    public function setSlugAttribute($value)
    {
      $this->attributes['slug'] = Str::slug( mb_substr($this->booking_number, 0, 40) . "-" . \Carbon\Carbon::now()->format('dmyHi'), '-');
    }

}
