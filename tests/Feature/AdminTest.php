<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Admin;

class AdminTest extends TestCase
{
    /** @test */
    public function users_can_view_admin_login_form(){

        $response = $this->get('/admin/login');

        $response->assertSuccessful();
        $response->assertViewIs('admin.login');
}

     /** @test */
      public function admin_cannot_view_a_login_form_when_authenticated(){
                
        $user = Admin::factory()->create();

        $response = $this->actingAs($user,'admin')
                    ->get('/admin/login')
                    ->assertRedirect('/admin/dashboard');

}

     /** @test */
     public function admin_can_view_all_appointment_list_when_authenticated(){
                
        $user = Admin::factory()->create();

        $response = $this->actingAs($user,'admin')
                    ->get('/admin/appointment/all');
        $response->assertSuccessful();
        $response->assertViewIs('admin.appointment.all');

}
     /** @test */
     public function admin_can_view_all_department_list_when_authenticated(){
                
        $user = Admin::factory()->create();

        $response = $this->actingAs($user,'admin')
                    ->get('/admin/departments');
        $response->assertSuccessful();
        $response->assertViewIs('admin.departments');

}

    /** @test */
      public function admin_can_not_view_index_page_when_authenticated(){
                    
        $user = Admin::factory()->create();

        $response = $this->actingAs($user,'admin')
                   ->get('/')
                   ->assertRedirect('/admin/dashboard');

}

}
