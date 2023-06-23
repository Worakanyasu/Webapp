<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
        //  Create Index
        public function index() {
            $data['students'] = Student::orderBy('id', 'asc')->paginate(5);
            return view('students.index', $data);
        }

        //  Create function create
        public function create() {
            return view('students.create');
        }
        
        // Store resource
        public function store(Request $request) {
            $request->validate([
                'topic' => 'required',
                'name' => 'required',
                'surname' => 'required',
                'email' => 'required'
            ]);

            $student = new Student;
            $student->topic = $request->topic;
            $student->name = $request->name;
            $student->surname = $request->surname;
            $student->email = $request->email;
            $student->save();
            return redirect()->route('students.index')->with('success', 'Student has been created successfully.');
        }

        public function edit(Student $student) {
            return view('students.edit', compact('student'));
        }
    
        public function update(Request $request, $id) {
            $request->validate([
                'topic' => 'required',
                'name' => 'required',
                'surname' => 'required',
                'email' => 'required',
            ]);
            $student = Student::find($id);
            $student->topic = $request->topic;
            $student->name = $request->name;
            $student->surname = $request->name;
            $student->email = $request->email;
            $student->save();
            return redirect()->route('students.index')->with('success', 'Student has been updated successfully');
        }
    
        public function destroy(Student $student){
            $student->delete();
            return redirect()->route('students.index')->with('success', 'Student has been deleted successfully');
        }
}
