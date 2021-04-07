<?php

namespace Modules\Siswa\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Siswa\Entities\Jurusan;
use Modules\Siswa\Http\Requests\CreateJurusanRequest;
use Modules\Siswa\Http\Requests\UpdateJurusanRequest;
use Modules\Siswa\Repositories\SiswaRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class JurusanController extends AdminBaseController
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $jurusans = Jurusan::all();
        return view('siswa::admin.jurusans.index' , compact('jurusans'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('siswa::admin.jurusans.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateJurusanRequest $request)
    {
        $data = $request->all();
        
        Jurusan::create($data);

        return redirect()->route('admin.siswa.jurusan.index')
                         ->withSuccess(
                            trans('core::core.messages.resource created', ['name' => trans('siswa::siswas.jurusan.title.jurusans')])
                        );
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show()
    {
        return view('siswa::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit(Jurusan $jurusan)
    {
        $jurusans = $jurusan;
        return view('siswa::admin.jurusans.edit' , compact('jurusans'));
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update($jurusan , UpdateJurusanRequest $request)
    {
        $data = $request->all();
        Jurusan::find($jurusan)->update($data);

        return redirect()->route('admin.siswa.jurusan.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('siswa::siswas.jurusan.title.jurusans')]));
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Jurusan $jurusan)
    {
        Jurusan::destroy($jurusan->id);

        return redirect()->route('admin.siswa.jurusan.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('siswa::siswas.jurusan.title.jurusans')]));
    }
}
