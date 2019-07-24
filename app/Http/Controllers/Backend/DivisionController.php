<?php

namespace App\Http\Controllers\Backend;

use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DivisionController extends Controller
{
    //something problem
//    public function __construct()
//    {
//        $this->middleware('auth:admin');
//    }
    public function manage_division()
    {
        $divisions = Division::orderBy('priority', 'asc')->get();
        return view('backend.pages.division.index', compact('divisions'));
    }

    public function division_create()
    {
        return view('backend.pages.division.create');
    }

    public function division_store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'priority' => 'required',
        ],
            [
                'name.required' => 'Please provide a division name',
                'priority.required' => 'Please provide a priority name',
            ]);

        $division = new Division();
        $division->name = $request->name;
        $division->priority = $request->priority;
        $division->save();

        session()->flash('success', 'A new division has created successfully ');
        return redirect()->route('admin.divisions.create');

    }

    public function division_edit($id)
    {
        $division = Division::find($id);
        if (!is_null($division)) {
            return view('backend.pages.division.edit', compact('division'));
        } else {
            return redirect()->route('admin.divisions');
        }
    }

    public function division_update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'priority' => 'required',
        ],
            [
                'name.required' => 'Please provide a division name',
                'priority.required' => 'Please provide a priority name',
            ]);
        $division = Division::find($id);
        $division->name = $request->name;
        $division->priority = $request->priority;
        $division->save();

        session()->flash('success', 'A new division has Updated successfully ');
        return redirect()->route('admin.divisions.edit');
    }

    public function division_delete($id)
    {
        $division = Division::find($id);
        if (!is_null($division)){
            //delete all the districts for this division
            $districts=District::where('division_id',$division->id)->get();
            foreach ($districts as $district){
                $district->delete();
            }
            $division->delete();
        }
        session()->flash('success', 'Division has deleted successfully ');
        return back();
    }

}
