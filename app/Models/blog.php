<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Blog extends Model
{
    use HasFactory;
    protected $table = 'BLOG';
    protected $primaryKey = 'BLOG_ID';

    public static function blogTitles() {
        $results = DB::table('BLOG')->select('TITLE')->distinct()->get()->toArray();
        //Note to GW: May need to check if attr are null.
        return $results;
    }
}