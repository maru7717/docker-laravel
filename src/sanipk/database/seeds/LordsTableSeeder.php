<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class LordsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // use DB facade
        DB::table('lords')->truncate();

        $now = Carbon::now();

        DB::table('lords')->insert([
          'name'          => '曹操',
          'display_order' => 910,
          'created_at' => $now,
          'updated_at' => $now,
        ]);
        DB::table('lords')->insert([
          'name'          => '劉備',
          'display_order' => 10,
          'created_at' => $now,
          'updated_at' => $now,
        ]);
        DB::table('lords')->insert([
          'name'          => '孫策',
          'display_order' => 20,
          'created_at' => $now,
          'updated_at' => $now,
        ]);
        DB::table('lords')->insert([
          'name'          => '劉璋',
          'display_order' => 920,
          'created_at' => $now,
          'updated_at' => $now,
        ]);
        DB::table('lords')->insert([
          'name'          => '劉表',
          'display_order' => 30,
          'created_at' => $now,
          'updated_at' => $now,
        ]);
        DB::table('lords')->insert([
          'name'          => '袁紹',
          'display_order' => 40,
          'created_at' => $now,
          'updated_at' => $now,
        ]);
        DB::table('lords')->insert([
          'name'          => '袁術',
          'display_order' => 50,
          'created_at' => $now,
          'updated_at' => $now,
        ]);
        DB::table('lords')->insert([
          'name'          => '劉繇',
          'display_order' => 930,
          'created_at' => $now,
          'updated_at' => $now,
        ]);
        DB::table('lords')->insert([
          'name'          => '公孫瓚',
          'display_order' => 940,
          'created_at' => $now,
          'updated_at' => $now,
        ]);
        DB::table('lords')->insert([
          'name'          => '孔融',
          'display_order' => 60,
          'created_at' => $now,
          'updated_at' => $now,
        ]);
        DB::table('lords')->insert([
          'name'          => '李傕',
          'display_order' => 70,
          'created_at' => $now,
          'updated_at' => $now,
        ]);
        DB::table('lords')->insert([
          'name'          => '張魯',
          'display_order' => 950,
          'created_at' => $now,
          'updated_at' => $now,
        ]);
        DB::table('lords')->insert([
          'name'          => '呂布',
          'display_order' => 80,
          'created_at' => $now,
          'updated_at' => $now,
        ]);
        DB::table('lords')->insert([
          'name'          => '張繍',
          'display_order' => 90,
          'created_at' => $now,
          'updated_at' => $now,
        ]);
    }
}
