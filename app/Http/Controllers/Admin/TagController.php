<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TagController extends Controller
{
    public $colors = [
        '' => 'Seleccione un color',
        'red' => 'Rojo',
        'blue' => 'Azul',
        'yellow' => 'Amarillo',
        'green' => 'Verde',
        'indigo' => 'Índigo',
        'purple' => 'Morado',
        'pink' => 'Rosa',
    ];

    public function __construct()
    {
        $this->middleware('can:admin.tags.index')->only('index');
        $this->middleware('can:admin.tags.create')->only('create', 'store');
        $this->middleware('can:admin.tags.edit')->only('edit', 'update');
        $this->middleware('can:admin.tags.destroy')->only('destroy');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $colors = $this->colors;
        return view('admin.tags.create', compact('colors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validation($request);
        $tag = Tag::create($request->all());
        return redirect()->route('admin.tags.edit', compact('tag'))->with('info', 'La etiqueta se ha creado con éxito');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag): View
    {
        $colors = $this->colors;
        return view('admin.tags.edit', compact('tag', 'colors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag): RedirectResponse
    {
        $this->validation($request, $tag);
        $tag->update($request->all());
        return redirect()->route('admin.tags.edit', compact('tag'))->with('info', 'La etiqueta se ha actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag): RedirectResponse
    {
        $tag->delete();
        return redirect()->route('admin.tags.index', compact('tag'))->with('info', 'La etiqueta se ha eliminado con éxito');
    }

    public function validation(Request $request, Tag $tag = null): void
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:tags'.($tag ? ',slug,'.$tag->id : ''),
            'color' => 'required'
        ]);
    }
}
