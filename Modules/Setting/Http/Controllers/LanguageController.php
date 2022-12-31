<?php

namespace Modules\Setting\Http\Controllers;

use App\Scopes\Asc;
use App\Exports\LangExport;
use App\Imports\LangImport;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use Modules\Setting\Entities\Language;
use Illuminate\Support\Facades\Storage;
use Modules\Setting\Http\Requests\LanguageRequest;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;

class LanguageController extends Controller
{
    public function index()
    {
        return view('setting::language.index', [
            'languages' => Language::withoutGlobalScopes([Asc::class])->get(),
        ]);
    }

    public function store(LanguageRequest $request)
    {

        $url = base_path() . '/lang/english.json';
        $result = file_get_contents($url);
        $result = json_decode($result);
        $result = json_encode($result, true);

        $lang = new Language();
        $lang->fill($request->all());
        $lang->slug = Str::slug($request->title, '-');
        $file = $lang->slug . '.json';
        $destination = base_path() . "/lang/";
        if (!is_dir($destination)) {
            mkdir($destination, 0777, true);
        }
        File::put($destination . $file, $result);
        $lang->save();
        return response()->json(['success' => 'Data Added Successfully']);

    }

    public function edit(Request $request, $slug)
    {

        $lang = Language::where('slug', $slug)->first();
        $url = base_path() . '/lang/' . $lang->slug . '.json';
        $result = file_get_contents($url);
        $results = json_decode($result);

        // if ($request->has('key')) {
        //     $results = collect($results)->filter(function ($item, $key) use ($request) {
        //         if (str_contains(strtolower($item), strtolower($request->key)) || str_contains(strtolower($key), strtolower($request->key))) {
        //             return $item;
        //         }
        //     });

        //     $results = $results->toArray();
        // }

        // $total = count((array) $results);
        // $per_page = 10;
        // $current_page = $request->input("page") ?? 1;

        // $starting_point = ($current_page * $per_page) - $per_page;
        // (array) $results = array_slice((array) $results, $starting_point, $per_page, true);

        // $results = new Paginator($results, $total, $per_page, $current_page, [
        //     'path' => $request->url(),
        //     'query' => $request->query(),
        // ]);

        return view('setting::language.edit-pharse', [
            'results' => $results,
            'lang' => $lang,
        ]);

        // return response()->json([
        //     'data' => [
        //         'results' => $results,
        //         'lang' => $lang
        //     ]
        // ]);
    }

    public function update(Request $request, $slug)
    {
        $lang = Language::where('slug', $slug)->first();
        $key = [];
        for ($i = 0; $i < count($request->key); $i++) {
            $key[$request->key[$i]] = $request->label[$i];
        }
        $result = json_encode($key, true);
        $file = base_path() . '/lang/' . $lang->slug . '.json';
        $this->deleteFile($file);
        $file = $lang->slug . '.json';
        $destination = base_path() . "/lang/";
        if (!is_dir($destination)) {
            mkdir($destination, 0777, true);
        }
        File::put($destination . $file, $result);
        return redirect()->route('settings.index')->with('success', 'Data updated successfully');
    }

    public function status($id) 
    {
        $lang = Language::findOrFail($id);
        $lang->status = $lang->status == 1 ? 0 : 1;
        $lang->save();
        return redirect()->back()->with('success', 'Status Changed successfully');
    }

    private function deleteFile($path)
    {
        if (Storage::exists($path)) {
            Storage::delete($path);
        }
    }

    public function exportLangPharse($slug) 
    {
        $lang = Language::where('slug', $slug)->first();
        $url = base_path() . '/lang/' . $lang->slug . '.json';
        $result = file_get_contents($url);
        $results = json_decode($result, true);
        
        $lang = [];
        $sl = 0;
        foreach($results as $key => $res){
            $lang[] = [
                '#' => ++$sl,
                'Phrase' => $key,
                'Label' => $res,
            ]; 
        }
        $newResults = new LangExport(
            $lang
        );

        return Excel::download($newResults, $slug.'-pharse.xlsx');
    }

    public function importLangPharse(Request $request, $slug)
    {
        $this->validate($request, [
            'import_phrase' => 'required|file|mimes:xlsx,csv'
        ]);

        if($request->hasFile('import_phrase')){
            Excel::import(new LangImport($slug), request()->file('import_phrase'));      
        }

        redirect()->route('settings.index')->with('success', 'Data Imported successfully');
    }

}
