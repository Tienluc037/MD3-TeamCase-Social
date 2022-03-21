<?php

namespace Database\Seeders;

use App\Models\StatusRelation;
use Illuminate\Database\Seeder;

class StatusRelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $relation = new StatusRelation();
        $relation->name = 'Pending';
        $relation->save();


        $relation = new StatusRelation();
        $relation->name = 'Friend';
        $relation->save();


        $relation = new StatusRelation();
        $relation->name = 'Blocked';
        $relation->save();
    }
}
