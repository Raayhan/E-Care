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
      public function doctors_cannot_view_a_login_form_when_authenticated(){
                
        $user = Doctor::factory()->create();

        $response = $this->actingAs($user,'doctor')
                    ->get('/doctor/login')
                    ->assertRedirect('/doctor/dashboard');

}

    /** @test */
      public function doctors_can_not_view_index_page_when_authenticated(){
                    
        $user = Doctor::factory()->create();

        $response = $this->actingAs($user,'doctor')
                   ->get('/')
                   ->assertRedirect('/doctor/dashboard');

}


    /** @test */
    public function doctors_can_not_view_patient_register_page_when_authenticated(){
                    
        $user = Doctor::factory()->create();

        $response = $this->actingAs($user,'doctor')
                   ->get('/patient/register')
                   ->assertRedirect('/doctor/dashboard');

}


    /** @test */
    public function unauthorized_users_can_not_access_doctor_dashboard(){

        $response = $this->get('/doctor/dashboard')
                    ->assertRedirect('/doctor/login');
}

   
}
