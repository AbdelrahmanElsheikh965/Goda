<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\ECommerce\Static\Models\Paragraph;
use App\ECommerce\Static\Models\WebImage;
use App\Models\Place;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(ClientSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(SubCategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(ContactUsSeeder::class);
        $this->call(PlaceSeeder::class);
        $this->call(ParagraphSeeder::class);
        $this->call(WebImageSeeder::class);
    }
}
