<?php

namespace Tests\Feature;

use App\Student;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Faker\Generator as Faker;

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
    public function logged_in_user_can_see_student_list(){
        $this->authUser();

        $this->get('/student')->assertStatus(200);
    }

    /**
     * @test
     * 
     * name is required
     */
    public function name_is_required(){
        $this->authUser();

        $reponse = $this->post('/student', array_merge($this->studentData(), ['name' => '']));
        
        $reponse->assertSessionHasErrors('name');
    }

    /**
     * @test
     * 
     * email is required
     */
    public function email_is_required(){
        $this->authUser();

        $response = $this->post('/student', array_merge($this->studentData(), ['email' => '']));
        $response->assertSessionHasErrors('email');

        $response = $this->post('/student', array_merge($this->studentData(), ['email' => 'hello']));
        $response->assertSessionHasErrors('email');
    }

    /**
     * @test
     * 
     * student email must be unique
     */
    public function student_email_must_be_unique(){
        $this->authUser();
        $this->createStudent();

        $response = $this->createStudent();

        $response->assertSessionHasErrors('email');
    }

    /**
     * @test
     * 
     * student data can be created through form
     */
    public function student_data_can_be_created_through_form(){
        $this->authUser();

        $this->createStudent();

        $this->assertCount(1, Student::all());
    }

    /**
     * @test
     * 
     * User can see student data
     */
    public function user_can_see_student_data(){
        $this->authUser();

        $student = Student::create($this->studentData());
        $data = $this->studentData();

        $this->assertEquals($student->name, $data['name']);
        $this->assertEquals($student->email, $data['email']);
    }

    /**
     * @test
     * 
     * user can update student data
     */
    public function user_can_update_student_data(){
        $this->authUser();

        $data = [
            'name' => 'Updated Student Name',
            'email' => 'updatedstudent@email.com'
        ];

        $student = Student::create($this->studentData());
        $this->put('/student/'. $student->id, $data);

        $updatedStudent = Student::find($student->id);
        $this->assertEquals($updatedStudent->name, $data['name']);
        $this->assertEquals($updatedStudent->email, $data['email']);
    }

    /**
     * @test
     * 
     * Delete Student Data
     */
    public function delete_student_data(){
        $this->authUser();

        $student = Student::create($this->studentData());

        $this->delete('student/'.$student->id);
        $this->assertCount(0, Student::all());
    }

    /**
     * Acting User
     */
    private function authUser(){
        $this->actingAs(factory(User::class)->create());
    }
    
    /**
     * Student test data
     */
    private function studentData(){
        return [
            'name' => 'Test name',
            'email' => 'test@gmail.com',
        ];
    }

    /**
     * create student data
     */
    private function createStudent(){
        return $this->post('/student', $this->studentData());
    }
}
