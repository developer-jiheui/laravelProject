<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Portfolio extends Model
{
    use HasFactory;
    protected $table = 'PORTFOLIO';
    protected $primaryKey = 'PORTFOLIO_ID';

    public static function categories() {
        $results = DB::table('PORTFOLIO')->select('category')->distinct()->get()->toArray();
       $return = [];
       foreach ($results as $result) if ($result->category!=null) $return[] = $result->category;
        return $return;
    }
}
