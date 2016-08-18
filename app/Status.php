<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{

    // Constants
    const INACTIVE_ID = 1;
    const ACTIVE_ID = 2;

    protected $table = 'status';
}
