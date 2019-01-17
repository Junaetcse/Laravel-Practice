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
        factory(App\Contact::class, 50)->create();
    }



// If try to create real data by using database seeder
    /*
        public function createMediaTypes()
        {
            $media_types = [
                'Audio',
                'Video',
                'Image',
            ];

            foreach ($media_types as $type) {
                MediaType::create([
                    'label' => $type,
                    'name' => str_slug($type),
                ]);
            }
        }
    */


}
