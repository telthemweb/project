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
       App\Setting::create([
        	'site_name'=>"Telthem's Blog",
        	'contact_number'=>'+263774914150',
        	'contact_email'=>'datatelthem@gmail.com',
        	'address'=>'3294 Chiwaridzo Phase 2, Bindura'
        ]);
    }
}
