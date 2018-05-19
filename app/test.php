<?php

namespace App;
use App\Http\Resources;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use function response;

class test extends Model
{
    public function ind()
    {
        $obj=DB::table('first_table')->get();
        Log::info($obj);
    }
}
