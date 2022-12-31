<?php
namespace Modules\Setting\Http\Controllers;

use App\Scopes\Asc;
use App\Traits\PictureTrait;
use App\Traits\PictureResizeTrait;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Modules\Setting\Entities\Currency;
use Modules\Setting\Entities\Language;
use Modules\Setting\Entities\Application;
use Modules\Setting\Http\Requests\ApplicationRequest;

class ApplicationController extends Controller {
    use PictureTrait, PictureResizeTrait;

    public function index() {

        return view('setting::__index', [
            'app' => Application::findOrfail(1),
        ]);
    }


    public function create() {
        $currencies = Currency::withoutGlobalScopes([Asc::class])->whereStatus(1)->get();
        return view('setting::__create_form', [
            'currencies' => $currencies,
        ]);
    }



    public function store(ApplicationRequest $request) {

        $app = new Application();
        $app->fill($request->all());

        if ($request->hasFile('logo')) {
            $request_file = $request->file('logo');
            $filename     = time() . rand(10, 1000) . '.' . $request_file->extension();
            $path         = $request_file->storeAs('application', $filename, 'public');
            $app->logo    = $path;
        }

        if ($app->save()) {
            $imageable_type = Application::class;
            if ($request->has('febicon')) {
                $this->resizeImage($request->febicon, $imageable_type, $app->id, $existing = 0);
            }
        }

        Toastr::success('Setting added successfully :)','Success');
        return redirect()->route('applications.index')->with('success', 'Data added successfully');

        
    }

    public function edit($id) {
        $app        = Application::findOrFail($id);
        $currencies = Currency::withoutGlobalScopes([Asc::class])->whereStatus(1)->get();
        $langs      = Language::withoutGlobalScopes([Asc::class])->get();
        return view('setting::__edit', [
            'currencies' => $currencies,
            'app'        => $app,
            'langs'      => $langs,
        ]);
    }



    public function update(ApplicationRequest $request, $id) {

        $app = Application::findOrFail($id);

        $old = $app->logo;
        $app->fill($request->all());

        if ($request->hasFile('logo')) {
            
            if ($old) {
                $this->deleteFile($old);
            }
            $request_file = $request->file('logo');
            $filename     = time() . rand(10, 1000) . '.' . $request_file->extension();
            $path         = $request_file->storeAs('application', $filename, 'public');
            $app->logo    = $path;

        }

        if ($request->hasFile('febicon')) {

            if ($old) {
                $this->deleteFile($old);
            }

            $request_file = $request->file('febicon');
            $filename     = time() . rand(10, 1000) . '.' . $request_file->extension();
            $path         = $request_file->storeAs('application', $filename, 'public');
            $app->febicon = $path;
        }

        $app->save();
        Toastr::success('Application Setting updated successfully :)','Success');
        return redirect()->route('applications.index')->with('success', 'Data updated successfully');

    }

}
