<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ContingentSeeder::class,
            SportSeeder::class,
            SubSportSeeder::class,
            VenueSeeder::class,
            AthleteSeeder::class,
            ScheduleSeeder::class,
            MatchResultSeeder::class,
            MedalTallySeeder::class,
            NewsCategorySeeder::class,
            NewsSeeder::class,
            PorprovRecordSeeder::class,
            GallerySeeder::class,
            DocumentSeeder::class,
            SupporterCheerSeeder::class,
        ]);
    }
}
