<?php

namespace Tests\Feature;


use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Patient;

class PatientsTest extends TestCase
{

     /** @test */
        public function users_can_view_patient_login_form(){

            $response = $this->get('/patient/login');

            $response->assertSuccessful();
            
            $response->assertViewIs('patient.login');
    }



     /** @test */
         public function users_can_view_patient_register_form(){

            $response = $this->get('/patient/register');
    
            $response->assertSuccessful();
            
            $response->assertViewIs('patient.register');
        }

    
    /** @test */
         public function patients_cannot_view_a_login_form_when_authenticated(){
                
            $user = Patient::factory()->create();

            $response = $this->actingAs($user,'patient')->get('/patient/login')->assertRedirect('/patient/dashboard');

        }

    /** @test */
          public function patients_can_not_view_index_page_when_authenticated(){
                
            $user = Patient::factory()->create();

            $response = $this->actingAs($user,'patient')->get('/')->assertRedirect('/patient/dashboard');

        }


    /** @test */
         public function unauthorized_users_can_not_access_patient_dashboard(){

            $response = $this->get('/patient/dashboard')->assertRedirect('/patient/login');
    }

  
}
