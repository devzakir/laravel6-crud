<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StudentTest extends TestCase
{
    use RefreshDatabase;
    
    /**
     * @test
     * 
     * user must be logged before accessing studentslist
     */
    public function user_must_be_logged_before_accessing_student_list(){
        $this->get('/student')->assertRedirect('/login');
    }

    /**
     * @test
     * 
     * logged in user can see student list
     */
}
