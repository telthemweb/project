<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = App\User::create([
        	'name'=>'Telthem Taulk',
        	'email'=>'datatelthem@gmail.com',
        	'password'=>bcrypt('physmach89'),
            'admin'=> 1
        ]);

        App\Profile::create([
            'user_id'=>$user->id,
            'avatar'=>'/uploads/avatars/avatar.jpg',
            'about'=>'My name is Innocent Tauzeni.I am a self taught web developer.I am honest, self motivated and have positive attitude towards my career and life.I am dynamic, pin-point accurate and result oriented person. In my free time I create cool stuff for the web and try out new technologies. I have been working recently with Reactjs,React Native, full stack Development, Angular 4 & 5and Materialize.',
            'facebook'=>'https://www.facebook.com/innocentTauzeni',
            'youtube'=> 'https://www.youtube.com/physmachTechnologies',
            'whatsapp'=> 'https://api.whatsapp.com/send?phone=+263774914150'
        ]);
    }
}
