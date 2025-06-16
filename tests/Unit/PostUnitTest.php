<?php

// tests/Unit/PostUnitTest.php
namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Post;

class PostUnitTest extends TestCase
{
    public function test_post_is_long()
    {
        $post = new Post(['content' => str_repeat('a', 150)]);
        $this->assertTrue($post->isLong());
    }

    public function test_post_is_not_long()
    {
        $post = new Post(['content' => 'short']);
        $this->assertFalse($post->isLong());
    }
}
