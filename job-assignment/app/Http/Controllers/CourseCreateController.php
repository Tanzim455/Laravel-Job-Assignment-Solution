<?php

namespace App\Http\Controllers;

use App\Http\Requests\CourseModuleRequest;
use App\Models\CourseModel;
use Illuminate\Http\Request;

class CourseCreateController extends Controller
{
    //
    public function create(){
        return view('course.create');
    }

    public function store(CourseModuleRequest $request){
        
        foreach ($request->addMoreInputFields as  $value) {
            CourseModel::create($value);
        }
        
         
        return response()->json([
          'status' => 200,
          'message' => 'CourseModules added successfully!',
          
      ]);
           
    }
}
