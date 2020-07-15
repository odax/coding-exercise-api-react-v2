<?php

namespace App\Http\Controllers;

use App\Person;
use Illuminate\Http\Request;

use App\Http\Requests;

class CsvController extends Controller
{
    public function showForm()
    {
        return view('upload');
    }

    public function store(Request $request)
    {
        //get file 
        $upload = $request -> file('upload-file');
        $filePath = $upload -> getRealPath();
        //open + read
        $file = fopen($filePath, 'r'); // r == readmode
        $header = fgetcsv($file);

        $ecapedHeader = [];
        //validate
        foreach($header as $key => $value) {
            $lowercaseHeader = strtolower($value);
            $escapedItem = preg_replace('/[^a-z]/', '', $lowercaseHeader);
            array_push($escapedHeader, $escapedItem);
        }

        //loop through other columns
        while($columns = fgetcsv($file)){
            if ($columns[0]==""){
                continue;
            }
            //trim
            foreach($columns as $key => $value) {
                $val = preg_replace('/\D/', '', $value);
            }

            $data = array_combine($escapedHeader, $columns);

            //setting type
            foreach($data as $key => &$value) {
                $value = (string)$value;
            }

            //push to table
            $first_name = $data['first_name'];
            $last_name = $data['last_name'];
            $email_address = $data['email_address'];
            $status = $data['status'];

            $person = Person::firstOrNew(['first_name'=>$first_name, 'last_name'=>$last_name, 'email_address'=>$email_address]);
            $person -> first_name = $first_name;
            $person -> last_name = $last_name;
            $person -> email_address = $email_address;
            $person -> status = $status;
            $person -> stave();
        }


    }
}