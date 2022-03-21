<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relation extends Model
{
    use HasFactory;

    public static function getRelationStatus($from,$to)
    {
        $relation =  Relation::where('from',$from)->where('to',$to)->first() ?? Relation::where('from',$to)->where('to',$from)->first()  ;

        if ($relation){
            return $relation->status_id ;
        }
        else{
            return 0 ;
        }
    }

    public static function getRelationship($from,$to)
    {
        return Relation::where('from',$from)->where('to',$to)->first() ?? Relation::where('from',$to)->where('to',$from)->first();

    }
}
