<?php

use Illuminate\Database\Seeder;

class EventSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\EventTable::class, 50)->create()->each(function ($u) {
           // $u->posts()->save(factory(App\Post::class)->make());
        });
    }
}
