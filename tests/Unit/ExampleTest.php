<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {    $data = [
    	 // 'EmpId' => '11111',
      //        'F_Name' => 'sai',
      //        'L_Name' => 'sri',
      //        'gender' => 'Male',
      //        'checkbox' => 'C',
    	  'name' => 'sandeep',
    	  'password' => '123456789'
        ];                             
    	   $response = $this->post('/checkLogin',$data);
    	 // $response->assertRedirect('/');
    	 // $this->testBasic();
    	  $this->createEmp();
          $this->updateEmp();
    	 // dd($response);
    	

        // dd('EmpId');
        // $response->assertStatus($response->status(),200);
        // dd($response);
        // $this->assertTrue(true);
         // $response = $this->get('/');
         //  $response->assertStatus(200);

    }
    public function createEmp(){
    	$data1 = [
    	           'EmpId' => '11116',
                   'F_Name' => 'sai',
                   'L_Name' => 'sri',
                   'gender' => 'Male',
                   'checkbox' => 'C',
    	
                 ];       
                 $response = $this->post('/saveCreateNewEmp',$data1);
                 dd($response);
                   return redirect('404Error'); 
     
                   $response->assertStatus($response->status(),200);                    
    }
    public function updateEmp(){
    	$data1 = [
    	          'EmpId' => '1234550',
                  'F_Name' => 'sai',
                  'L_Name' => 'sri',
                  'gender' => 'Male',
                  'checkbox' => 'C++',
    	
                 ];       
                 $response = $this->put('/updateNewEmp/2',$data1);      
                 $response->assertStatus($response->status(),200);                    
    }
}
