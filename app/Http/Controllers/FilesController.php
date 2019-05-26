<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\FileRequest;
use App\User;
use App\File;
use Illuminate\Support\Facades\Storage;


class FilesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth', [
            'only' => ['create' , 'store', 'edit', 'update', 'destroy']
        ]);
        $this->middleware('can:touch,file',[
            'only' => ['edit','update','destroy']
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::paginate(12);

        return view('public.files.index')->withFiles($files);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('public.files.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FileRequest $request)
    {
        $file = $request->file('archivo');
        File::create([
            'user_id' => $request->user()->id,
            'name' => request('name'),
            'slug' => str_slug(request('name'), "-"),
            'description' => request('description'),
            'archivo' => $file->store('archivos','public'),
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $file = File::where('slug', $slug)->firstOrFail();
        return view('public.files.show', ['file' => $file]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        return view('public.files.edit', ['file' => $file]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FileRequest $request, File $file)
    {
        $archivo = $request->file('archivo');
        $file->update([
            'name' => request('name'),
            'slug' => str_slug(request('name'), "-"),
            'description' => request('description'),
            'archivo' => $archivo->store('arhivos','public'),
        ]);
        return redirect('/files/'.$file->slug);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        $file->delete();
        return redirect('/');
    }

    public function contact(){
        return view('public.contact');
    }

    public function about(){
        return view('public.contact');
    }
}
