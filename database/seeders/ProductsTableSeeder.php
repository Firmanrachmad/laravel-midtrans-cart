<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            'name' => 'Produk A',
            'description' => 'Deskripsi Produk A',
            'photo' => 'https://picsum.photos/id/15/200/300',
            'price' => 15000
        ]);

        DB::table('products')->insert([
            'name' => 'Produk B',
            'description' => 'Deskripsi Produk B',
            'photo' => 'https://picsum.photos/id/151/200/300',
            'price' => 13000
        ]);

        DB::table('products')->insert([
            'name' => 'Produk C',
            'description' => 'Deskripsi Produk C',
            'photo' => 'https://picsum.photos/id/125/200/300',
            'price' => 25000
        ]);

        DB::table('products')->insert([
            'name' => 'Produk D',
            'description' => 'Deskripsi Produk D',
            'photo' => 'https://picsum.photos/id/57/200/300',
            'price' => 7000
        ]);

        DB::table('products')->insert([
            'name' => 'Produk E',
            'description' => 'Deskripsi Produk E',
            'photo' => 'https://picsum.photos/id/65/200/300',
            'price' => 54000
        ]);

        DB::table('products')->insert([
            'name' => 'Produk F',
            'description' => 'Deskripsi Produk F',
            'photo' => 'https://picsum.photos/id/75/200/300',
            'price' => 15000
        ]);
    }
}
