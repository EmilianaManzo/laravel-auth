<?php

namespace App\Http\Controllers\Admin;

use App\Functions\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\TecnologyRequest;
use App\Models\Tecnology;
use Illuminate\Http\Request;

class TecnologyController extends Controller
{
    /**
     * Display a listing of the resource.
*/
    public function index()
    {
        $tecns = Tecnology::paginate(10);
        return view('admin.tecnologies.index', compact('tecns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TecnologyRequest $request)
    {
        $form_data = $request->all();

        $exist = TecnologyRequest::where('name', $form_data['name'])->first();
        if($exist){
            return redirect()->route('admin.tecnologies.index')->with('error', 'Tipo già esistente');
        }else{
            $new_tecn = new TecnologyRequest();
            $form_data['slug'] = Helper::createSlug($form_data['name'], TecnologyRequest::class);
            $new_tecn->fill($form_data);
            $new_tecn->save();

            return redirect()->route('admin.tynew_tecnologies.index')->with('success', 'Il Tipo è stato creato');

        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TecnologyRequest $request, Tecnology $tecn)
    {
        $form_data = $request->all();


        if($form_data['name'] === $tecn->name){
            $form_data['slug'] = $tecn->slug;
        }else{
            $form_data['slug'] = Helper::createSlug($form_data['name'], TecnologyRequest::class) ;
        }
        dd($form_data);
            $tecn->update($form_data);
            return redirect()->route('admin.tecnologies.index',$tecn);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tecnology $tecn)
    {
        $tecn->delete();

        return redirect()->route('admin.tecnologies.index')->with('deleted', 'Il progetto'. ' ' . $tecn->name. ' ' .'è stato cancellato con successo!');
    }
}
