<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Doctor;

class DoctorsTest extends TestCase
{
     /** @test */
     public function users_can_view_doctor_login_form(){

        $response = $this->get('/doctor/login');

        $response->assertSuccessful();
        $response->assertViewIs('doctor.login');
}


    /** @test */
    public function unauthorized_users_can_not_access_doctor_dashboard(){

        $response = $this->get('/doctor/dashboard')->assertRedirect('/doctor/login');
}

   
}
