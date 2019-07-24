<?php

namespace App\Http\Controllers\Backend;

use App\Models\District;
use App\Models\Division;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DistrictController extends Controller
{
//    something problem
//    public function __construct()
//    {
//        $this->middleware('auth:admin');
//    }
    public function manage_district()
    {
        $districts = District::orderBy('name', 'asc')->get();
        return view('backend.pages.district.index', compact('districts'));
    }

    public function district_create()
    {
        $divisions = Division::orderBy('priority', 'asc')->get();
        return view('backend.pages.district.create', compact('divisions'));
    }

    public function district_store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'division_id' => 'required',
        ],
            [
                'name.required' => 'Please provide a district name',
                'division_id.required' => 'Please provide a division name for district',
            ]);

        $district = new District();
        $district->name = $request->name;
        $district->division_id = $request->division_id;
        $district->save();

        session()->flash('success', 'A new district has created successfully ');
        return redirect()->route('admin.districts.create');

    }

    public function district_edit($id)
    {
        $divisions = Division::orderBy('priority', 'asc')->get();
        $district = District::find($id);
        if (!is_null($district)) {
            return view('backend.pages.district.edit', compact('district', 'divisions'));
        } else {
            return redirect()->route('admin.districts');
        }
    }

    public function district_update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'division_id' => 'required',
        ],
            [
                'name.required' => 'Please provide a district name',
                'division_id.required' => 'Please provide a division name for district',
            ]);
        $district = District::find($id);
        $district->name = $request->name;
        $district->division_id = $request->division_id;
        $district->save();

        session()->flash('success', 'A new district has Updated successfully ');
        return redirect()->route('admin.districts');
    }

    public function district_delete($id)
    {
        $district = Division::find($id);
        if (!is_null($district)) {
            $district->delete();
        }
        session()->flash('success', 'District has deleted successfully ');
        return back();
    }

}
