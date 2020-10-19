<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Book;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class BookTest extends TestCase
{
    /**
     * A book create feature test.
     *
     * @return void
     */
    public function testABookCanBeAddedToTheLibrary()
    {
        $this->withoutExceptionHandling(); // to view actually error
       
        $response = $this->post('books', [
            'name'=> 'A cool book Name',
            'author' => 'Cool book author'
            ]);
        
        $response->assertRedirect('books');
        $this->assertCount(1, Book::all());
    }
    
    /*
     * 
     */
    public function testApplication()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)
                         ->withSession(['email' => 'test@test.com',
                                        'passwordddd' => '123456789'
                                    ])
                         ->get('/');
        // Increment the assertion count to signal this test passed.
        // This is important if you use a @depends on this test
        $this->addToAssertionCount(1);
    }
}
