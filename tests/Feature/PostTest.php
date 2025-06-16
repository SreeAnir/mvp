<?php
// tests/Feature/PostTest.php
namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PostTest extends TestCase
{
    use RefreshDatabase;

    public function test_posts_are_listed()
    {
        Post::factory()->create(['title' => 'Test A']);
        Post::factory()->create(['title' => 'Test B']);

        $response = $this->get('/posts');
        $response->assertSee('Test A');
        $response->assertSee('Test B');
    }

    public function test_post_can_be_created()
    {
        $response = $this->post('/posts', [
            'title' => 'New Title',
            'content' => 'Some content',
        ]);

        $response->assertRedirect('/posts');
        $this->assertDatabaseHas('posts', ['title' => 'New Title']);
    }
}
