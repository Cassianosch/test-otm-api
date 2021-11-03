<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of all products.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Student::all();
    }

    /**
     * Store the specified new student.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = $this->validationStudent();

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
            return response()->json($validator->messages(), 400);

        return Student::create($request->all());
    }

    /**
     * Display the specified student and its quantity history.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
        if ($student == null)
            return response(['message' => false], 400);
        return $student;
    }


    /**
     * Update the specified student.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = $this->validationStudent();
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails())
            return response()->json($validator->messages(), 400);

        $student = Student::find($id);
        if ($student == null)
            return response(['message' => false], 400);

        $student->update($request->all());
        return $student;
    }

    /**
     * Remove the specified student from the database.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Student::destroy($id)) {
            return ['message' => true];
        }
        return response(['message' => false], 400);
    }

    private function validationStudent()
    {
        return [
            'first_name' => ['required', 'min:1', 'max:150'],
            'last_name'  => ['required', 'min:1', 'max:150'],
            'birthday'   => ['required', 'date'],
            'course'     => ['required', 'max:150'],
            'hour'       => ['required', 'numeric'],
            'price'      => ['required', 'numeric']
        ];
    }
}
