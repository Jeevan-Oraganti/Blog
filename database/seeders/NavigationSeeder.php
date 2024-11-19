<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NavigationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('navigation')->insert([
            ['name' => 'Home', 'url' => '/', 'is_disabled' => false, 'is_featured' => true, 'icon_url' => 'fas fa-home', 'onclick' => null],
            ['name' => 'Dashboard', 'url' => '/admin/posts', 'is_disabled' => true, 'is_featured' => true, 'icon_url' => 'fas fa-tachometer-alt', 'onclick' => null],
            ['name' => 'New Post', 'url' => '/admin/posts/create', 'is_disabled' => true, 'is_featured' => false, 'icon_url' => 'fas fa-plus', 'onclick' => null],
            ['name' => 'Contacts', 'url' => '/admin/contacts', 'is_disabled' => false, 'is_featured' => true, 'icon_url' => 'fas fa-phone-alt', 'onclick' => null],
            ['name' => 'Navigation', 'url' => '/navigation', 'is_disabled' => false,'is_featured' => true, 'icon_url' => 'fas fa-bars', 'onclick' => null],
            ['name' => 'Newsletter', 'url' => '#newsletter', 'is_disabled' => false, 'is_featured' => false, 'icon_url' => 'fas fa-envelope', 'onclick' => null],
            ['name' => 'Log Out', 'url' => '#', 'is_disabled' => false, 'is_featured' => false, 'icon_url' => 'fas fa-sign-out-alt', 'onclick' => "document.querySelector('#logout-form').submit()"],
        ]);
    }
}
