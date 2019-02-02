<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaravelCollection extends Controller
{
    //

    public function index(){


        $this->eachSpread();
        $this->first();
        $this->flaten();

    }



    public function eachSpread(){
        $collection = collect([['John Doe', 35], ['Jane Doe', 33]]);
        $collection->eachSpread(function ($name, $age) {
            return false;
        });
    }

    public function first(){
        // access first value when need to use condition
        collect([1, 2, 3, 4])->first(function ($value, $key) {
            return $value > 2;
        });
    }


    public function  flaten(){
        $collection = collect(['name' => 'taylor', 'languages' => ['php', 'javascript']]);
        $flat = $collection->flatten();
        $dd1 = $flat->all();
        $collection = collect([
            'Apple' => [
                ['name' => 'iPhone 6S', 'brand' => 'Apple'],
            ],
            'Samsung' => [
                ['name' => 'Galaxy S7', 'brand' => 'Samsung']
            ],
        ]);

        $products = $collection->flatten(1);
        dd($dd1, $products->values()->all());
    }

    







}
