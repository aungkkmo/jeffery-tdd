<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateThreadsTest extends TestCase
{
    use DatabaseMigrations;
  
    public function test_guest_may_not_create_thread()
    {   
        $this->withExceptionHandling();
        
        $this->get('/threads/create')
        ->assertRedirect('/login');

        $this->post('/threads')
        ->assertRedirect('/login');
    }

    function test_guests_cannot_see_the_create_thread_page(){

        $this->withExceptionHandling()
             ->get('/threads/create')
             ->assertRedirect('/login');

    }

    public function test_an_authenticated_user_can_create_new_forum_threads()
    {
        $this->signIn();

        $thread= create('App\Thread');

        $this->post('/threads',$thread->toArray());
    
        $this->get($thread->path())
             ->assertSee($thread->title)
             ->assertSee($thread->body);
    }

    public function test_a_thread_belongs_to_a_channel()
    {
        $thread= create('App\Thread');

        $this->assertInstanceOf('App\Channel',$thread->channel);

    }
}
