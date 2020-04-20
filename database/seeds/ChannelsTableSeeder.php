<?php

use Illuminate\Database\Seeder;
use App\Channel;
class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Channel::create([
          'name'=>'laravel 7.3',
          'slug'=>str_slug('laravel 7.3')
        ]);
        Channel::create([
          'name'=>'node js',
          'slug'=>str_slug('node js')
        ]);
        Channel::create([
          'name'=>'Bootstrap',
          'slug'=>str_slug('Bootstrap')
        ]);
        Channel::create([
          'name'=>'php 7',
          'slug'=>str_slug('php 7')
        ]);
    }
}
