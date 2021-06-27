<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Laravel\Passport\Passport;


abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    public $baseUrl = "/api/v1/";


    /* 
        se configura el setup para test unitarios y asegurarnos que se use la authentication
    */
    
    public function setUp():void 
    {
        parent::setUp();
        $this->signIn();
    }
    

    public function signIn(){ # se incorpora el metodo 
        Passport::actingAs(create('App\Models\User'));
    }
    
    
}
