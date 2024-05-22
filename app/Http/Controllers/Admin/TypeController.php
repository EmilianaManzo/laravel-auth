<?php

namespace App\Http\Controllers\Admin;

use App\Functions\Helper;
use App\Http\Controllers\Controller;
use App\Http\Requests\TypeRequest;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::paginate(10);
        return view('admin.types.index', compact('types'));
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
    public function store(TypeRequest $request)
    {
        $form_data = $request->all();

        $exist = TypeRequest::where('name', $form_data['name'])->first();
        if($exist){
            return redirect()->route('admin.types.index')->with('error', 'Tipo già esistente');
        }else{
            $new_type = new TypeRequest();
            $form_data['slug'] = Helper::createSlug($form_data['name'], TypeRequest::class);
            $new_type->fill($form_data);
            $new_type->save();

            return redirect()->route('admin.type.index')->with('success', 'Il Tipo è stato creato');

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
    public function update(TypeRequest $request, Type $type)
    {
        $form_data = $request->all();


        $exist = TypeRequest::where('name', $form_data['name'])->first();
        if($form_data['name'] === $type->name){
            $form_data['slug'] = $type->slug;
        }else{
            $form_data['slug'] = Helper::createSlug($form_data['name'], TypeRequest::class) ;
        }

        $type->update($form_data);
        return redirect()->route('admin.types.index',$type);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();

        return redirect()->route('admin.types.index')->with('deleted', 'Il progetto'. ' ' . $type->name. ' ' .'è stato cancellato con successo!');
    }
}
