<?php

namespace App\Http\Controllers;

use App\Models\Vacance;
use Illuminate\Http\Request;

class VacanceController extends Controller{
    public function indexAdmin(Request $request){
    $search = $request->input('search');
    $vacances = Vacance::when($search, function ($query, $search) {
        return $query->where('title', 'like', "%{$search}%")
                     ->orWhere('description', 'like', "%{$search}%");
    })->paginate(10);
        return view('admin.vacances.index', compact('vacances'));  
      }

    public function indexUser(){
        $vacances = Vacance::all();
        return view('user.vacances.index', compact('vacances'));
    }

     public function create(Request $request){
        return view('admin.vacances.create');    
    }

    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        Vacance::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        return redirect()->route('admin.vacances.index')->with('success', 'Vacance created successfully.');
    }

    public function show(Vacance $vacance){
        //
    }

    public function edit($id){
        $vacance = Vacance::findOrFail($id);
        return view('admin.vacances.edit', compact('vacance'));    
    }

    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $vacance = Vacance::findOrFail($id);
        $vacance->update($request->all());
        return redirect()->route('admin.vacances.index')->with('success', 'Vacance created successfully.');
    }

    public function destroy($id){
        $vacance = Vacance::findOrFail($id);
        $vacance->delete();
        return redirect()->route('admin.vacances.index')->with('success', 'Vacance deleted successfully.');
    }

    public function toggleStatus($id)
{
    $vacance = Vacance::findOrFail($id);
    $vacance->status = $vacance->status === 'active' ? 'inactive' : 'active';
    $vacance->save();

    return redirect()->back()->with('success', 'Vacance status updated successfully.');
}

}
