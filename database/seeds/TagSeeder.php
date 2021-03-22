<?php

use App\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tag = new Tag();
        $tag->name = 'Mới';
        $tag->save();

        $tag = new Tag();
        $tag->name = 'Đẹp';
        $tag->save();

        $tag = new Tag();
        $tag->name = 'Phổ biến';
        $tag->save();

        $tag = new Tag();
        $tag->name = 'Hay';
        $tag->save();

        $tag = new Tag();
        $tag->name = 'Khủng';
        $tag->save();

        $tag = new Tag();
        $tag->name = 'Hot';
        $tag->save();
    }
}
