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
        
         $course=CourseModel::create($request->validated());
        
         
        return response()->json([
          'status' => 200,
          'message' => 'Product created successfully!',
          'product' => $course,
      ]);
           
    }
}
