<?php

namespace Database\Seeders;

use App\Models\Brands;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->createBrand('acer');
        $this->createBrand('apple');
        $this->createBrand('asus');
        $this->createBrand('dell');
        $this->createBrand('fujitsu');
        $this->createBrand('hisense');
        $this->createBrand('huawei');
        $this->createBrand('hp');
        $this->createBrand('ibm');
        $this->createBrand('lenovo');
        $this->createBrand('mirosoft');
        $this->createBrand('razor');
        $this->createBrand('samsung');
        $this->createBrand('sony');
        $this->createBrand('thinkpad');
        $this->createBrand('xiaomi');
    }

    public function createBrand($name)
    {
        Brands::create([
            'name' => Str::upper($name),
            'slug' => Str::slug($name),
        ]);
    }
}
