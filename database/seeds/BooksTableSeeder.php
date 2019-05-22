<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $book = new \App\Book();
        $book->name = 'PHP Cơ Bản';
        $book->description = 'PHP Cơ Bản, Nhập môn PHP';
        $book->author = 'NXB Khoa Học và Công Nghệ';
        $book->image = '';
        $book->quantity = '22';
        $book->publication_date = '2012-11-08';
        $book->save();
    }

}
