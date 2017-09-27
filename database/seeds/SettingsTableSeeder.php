<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Setting::create([
          'site_name'=>  'Laravel Blog',
          'address'=> 'Russia',
          'contact_number'=> '639187621885',
          'contact_email'=>'diaz_cy@yahoo.com'
        ]);
    }
}
