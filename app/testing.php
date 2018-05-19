<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class testing extends Model
{
    public function ind()
    {
        Log::info("i am in");
    }
}
