<?php

use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        # Lets create 150 random phones
//       factory(\App\Contact::class, 25)->create([
//            'user_id' => $this->getRandomUserId()
//        ]);
//    }
//
//
//    private function getRandomUserId() {
//        $user = \App\User::inRandomOrder()->first();
//        return $user->id;
//

        factory(App\Contact::class, 50)->create();
    }





}
