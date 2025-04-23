<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\DB;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'COMMENT';
    protected $primaryKey = 'COMMENT_ID';

    public static function displayComments(){
        $results = DB::table('COMMENT')->select('TITLE')->distinct()->get()->toArray();
        return $results;
    }
}