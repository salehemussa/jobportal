<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Vacance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;


class ApplicationController extends Controller{

public function indexAdmin(Request $request){
    $applications = Application::with(['user','vacance'])->get();
    return view('admin.applications.index', compact('applications'));
}

public function indexUser(Request $request){
    $user = Auth::user();
    $applications = $user->applications()->with(['user','vacance'])->latest()->get();
    return view('user.applications.index', compact('applications'));
    }

public function download(Application $application){
    return Storage::disk('public')->download($application->cover_letter_path);
}

public function downloadUser(Application $application){
    return Storage::disk('public')->download($application->cover_letter_path);
}

public function storeUser(Request $request, Vacance $vacance){
    $request->validate([
        'cover_letter' => 'required|mimes:pdf|max:2048',
    ]);

    if($request->hasFile('cover_letter')){
     $path = $request->file('cover_letter')->store('cover_letters', 'public');

    Application::create([
        'user_id' => auth()->id(),
        'vacance_id' => $vacance->id,
        'cover_letter_path' => $path,
    ]);

    return back()->with('success', 'Application submitted.');
     }else{
    return back()->withErrors(['cover_letter' => 'upload failed.']);
        }
    }
  
    public function create(){
        //
    }

    public function show(Application $application){
        //
    }

    public function edit(Application $application)
    {
        //
    }

    public function update(Request $request, Application $application)
    {
        //
    }

    public function destroy(Application $application)
    {
        //
    }

    public function generatePDF(){
        $pdf = Pdf::loadView('admin.applications.report'); 
        return $pdf->download('job_applications_report.pdf');
   }

}
