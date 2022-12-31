<?php

namespace Modules\Setting\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Carbon\Carbon;
use File;


class BackupController extends Controller
{

    public function index(){
        return view('setting::backup.index');
    }

    public function confirm(){
        try {
            Artisan::call('database:backup');
            $filename = "export_" . Carbon::now()->format('Y-m-d') . ".sql";            
            $filePath = public_path('database/'.$filename);
            $headers = ['Content-Type: application/sql'];
            return response()->download($filePath,$filename, $headers);
            
        } catch (\Throwable $th) {
            throw $th;
        }
        
    }

    public function import(){
        return view('setting::backup.import');
    }

    public function importConfirm(Request $request)
    {
        $this->validate($request, [
            'image' => 'required'
        ]);

        if (file_exists(public_path('database/import/database.sql'))){
            $old_file = public_path('database/import/database.sql');
            File::delete($old_file );
        }

        if($request->hasFile('image')){
            $extension = $request->image->getClientOriginalExtension();
            $request->file('image')
            ->move('database/import/', 'import.'.$extension);
        }
        $path = public_path('database/import/import.sql');
        Artisan::call('database:import ' . $path);
        return redirect()->back()->with('success', 'Database import successfully');
    }

    public function restoreDatabase(){
        try {
            $path = public_path('database/default.sql');
            Artisan::call('database:import ' . $path);
            return redirect()->route('settings.index')->with('success', 'Database Restored Successfully');
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
