<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubjectRequest;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(){
        $subjects = Subject::paginate(PAGINATION_COUNT);
        return view('admin.subject.index', compact('subjects'));
    }

    public function add(){
        return view('admin.subject.add');
    }

    public function store(SubjectRequest $request){
        $data = $request->except(['_token']);
        Subject::create( $data );
        return redirect()->route('subject.index')->with(['success' => __('admin.subject_added_successfully')]);
    }

    public function edit($id){
        $subject = Subject::find($id);

        if ( !$subject ){
            return redirect()->route('subject.index')->with(['error' => __('admin.subject_edit_error')]);
        }

        return view('admin.subject.edit', compact('subject'));
    }

    public function update($id, SubjectRequest $request){
        $subject = Subject::find($id);

        if ( !$subject ){
            return redirect()->route('subject.index')->with(['error' => __('admin.subject_edit_error')]);
        }

        $data = $request->except(['_token']);

        $subject->update($data);
        return redirect()->route('subject.index')->with(['success' => __('admin.subject_edit_successfully')]);
    }

    public function delete($id){
        $subject = Subject::find($id);

        if ( !$subject ){
            return redirect()->route('subject.index')->with(['error' => __('admin.subject_edit_error')]);
        }

        $subject->delete();
        return redirect()->route('subject.index')->with(['success' => __('admin.subject_deleted_successfully')]);
    }
}
