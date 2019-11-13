<?php

use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $category1 = Category::create([
            'name' => 'News'
        ]);

        $category2 = Category::create([
            'name' => 'Partnership'
        ]);

        $category3 = Category::create([
            'name' => 'Partnership'
        ]);

        $post1 = Post::create([
            'name' => 'We relocated our office to a new designed garage',
            'description' => 'Congratulate and thank to Maryam for joining our team',
            'content' => 'Congratulate and thank to Maryam for joining our team',
            'category_id' => $category1->id,
            'image' => 'posts/1.jpg'
        ]);

        $post2 = Post::create([
            'name' => 'Best practices for minimalist design with example',
            'description' => 'Congratulate and thank to Maryam for joining our team',
            'content' => 'Congratulate and thank to Maryam for joining our team',
            'category_id' => $category2->id,
            'image' => 'posts/2.jpg'
        ]);

        $post3 = Post::create([
            'name' => 'New published books to read by a product designer',
            'description' => 'Congratulate and thank to Maryam for joining our team',
            'content' => 'Congratulate and thank to Maryam for joining our team',
            'category_id' => $category3->id,
            'image' => 'posts/3.jpg'
        ]);

        $tag1 = Tag::create([
            'name' => 'Customers',
        ]);

        $tag2 = Tag::create([
            'name' => 'Job',
        ]);

        $tag3 = Tag::create([
            'name' => 'Design',
        ]);

        $post1->tags()->attach([$tag1->id. $tag2->id]);
        $post2->tags()->attach([$tag1->id. $tag2->id]);
        $post3->tags()->attach([$tag1->id. $tag2->id]);

    }
}
