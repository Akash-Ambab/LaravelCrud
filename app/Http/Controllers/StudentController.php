<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\StudentRepository;

class StudentController extends Controller
{
    protected $studentRepo;
    
    public function __construct(StudentRepository $studentRepo) {
        $this->studentRepo = $studentRepo;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $records = $this->studentRepo->showStudents();
        return view('home')->with('records', $records);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->studentRepo->insertStudent($request);
        return redirect('student');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $records = $this->studentRepo->showStudent($id);
        return view('edit')->with('record', $records);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->studentRepo->updateStudent($request, $id);
        return redirect('student');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->studentRepo->deleteStudent($id);
        return redirect('student');
    }
}
