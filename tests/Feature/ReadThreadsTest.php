<?php
namespace Tests\Feature;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ReadThreadsTest extends TestCase
{
    use DatabaseMigrations;

    protected $thread;
    
    function setUp()
    {
        parent::setUp();

        $this->thread = create('App\Thread');
    }

    /** @test */
    function a_user_can_view_all_threads()
    {
        $this->get('/threads')
            ->assertSee($this->thread->title);
    }

    /** @test */
    function a_user_can_read_a_single_thread()
    {
        $this->get($this->thread->path())
            ->assertSee($this->thread->title);
    }

    /** @test */
    function a_user_can_read_replies_that_are_associated_with_a_thread()
    {
        $reply = create('App\Reply', ['thread_id' => $this->thread->id]);

        $this->get($this->thread->path())
            ->assertSee($reply->body);
    }

    /** @test */
    function a_user_can_filter_threads_according_to_a_channel()
    {
        $channel = create('App\Channel');

        $threadInChannel = create('App\Thread', ['channel_id' => $channel->id]);

        $threadNotInChannel = create('App\Thread');
        $this->get('/threads/' . $channel->slug)
            ->assertSee($threadInChannel->title)
            ->assertDontSee($threadNotInChannel->title);
    }

     /** @test */
     function a_user_can_fitler_threads_by_username(){
         $this->signIn(create('App\User',['name'=>'JohnDoe']));

         $threadbyJohn=create('App\Thread',['user_id'=>auth()->id()]);

         $threadNotbyJohn=create('App\Thread');

         $this->get('threads?by=JohnDoe')
         ->assertSee($threadbyJohn->title)
         ->assertDontSee($threadNotbyJohn->title);

     }

     /** @test */
     function a_user_can_filter_threads_by_popularity()
     {
        $threadWiithTwoReplies=create('App\Thread');

        create('App\Reply',['thread_id'=>$threadWiithTwoReplies->id],2);

        $threadWithThreeReplies=create('App\Thread');

        create('App\Reply',['thread_id'=>$threadWithThreeReplies->id],3);

        $threadwithNoReplies=$this->thread;

        $response=$this->getJson('threads?popular=1')->json();

        $this->assertEquals([3,2,0],array_column($response, 'replies_count'));
     }
}