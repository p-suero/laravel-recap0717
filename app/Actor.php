<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    public function movies() {
        return $this->belongsToMany("App\Movie");
    }

    public function getFullName() {
        return $this->name . " " . $this->lastname;
    }
}
