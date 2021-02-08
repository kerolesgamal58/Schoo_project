<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeeRequest;
use App\Models\Fee;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    public function index(){
        $fees = Fee::paginate(PAGINATION_COUNT);
        return view('admin.school_year.index', compact('fees'));
    }

    public function add(){
        return view('admin.school_year.add');
    }

    public function store(FeeRequest $request){
        $data = $request->except(['_token']);
        Fee::create( $data );
        return redirect()->route('school_year.index')->with(['success' => __('admin.fee_added_successfully')]);
    }

    public function edit($id){
        $fee = Fee::find($id);

        if ( !$fee ){
            return redirect()->route('school_year.index')->with(['error' => __('admin.fee_edit_error')]);
        }

        return view('admin.school_year.edit', compact('fee'));
    }

    public function update($id, FeeRequest $request){
        $fee = Fee::find($id);

        if ( !$fee ){
            return redirect()->route('school_year.index')->with(['error' => __('admin.fee_edit_error')]);
        }

        $data = $request->except(['_token']);

        $fee->update($data);
        return redirect()->route('school_year.index')->with(['success' => __('admin.fee_edit_successfully')]);
    }

    public function delete($id){
        $fee = Fee::find($id);

        if ( !$fee ){
            return redirect()->route('school_year.index')->with(['error' => __('admin.fee_edit_error')]);
        }

        $fee->delete();
        return redirect()->route('school_year.index')->with(['success' => __('admin.fee_deleted_successfully')]);
    }
}
