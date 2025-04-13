<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Validator;

class StudentController extends Controller
{
    public function index() {
        $student = Student::all();
        $data = [
            'status'=>200,
            'student'=>$student
        ];
        return response()->json($data,200);
    }
    
    public function addStudent(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email'
        ]);

        if($validator->fails()){
            $data = [
                'status'=>422,
                'message'=>$validator->message()
            ];
            return response()->json($data,422);
                
        }
        else{
            $student = new Student;
            $student->name= $request->name;
            $student->email=$request->email;
            $student->phone=$request->phone;

            $student->save();
            $data = [
                'status'=>200,
                'message'=>'Data Uploaded Succesfully'
            ];
            return response()->json($data,200);
        }
        // $incomingFields = $request->validate([
        //     'name'=>['required', Rule::unique('students', 'name')],
        //     'email'=>['required', 'email', Rule::unique('students', 'email')],
        //     'phone'=>'required'
        // ]);

        // if(empty($incomingFields)){
        //     $data = [
        //         'status'=>422,
        //         'message'=>'Error'
        //     ];
        //     return response()->json($data,422);
        // }
        // else{
        //     $student = new Student;
        //     $student->name=$incomingFields['name'];
        //     $student->email=$incomingFields['email'];
        //     $student->phone=$incomingFields['phone'];

        //     $student->save();
        //     $data = [
        //         'status'=>200,
        //         'message'=>'Data Uploaded Succesfully'
        //     ];
        //     return response()->json($data,200);
        // }
    }
}
