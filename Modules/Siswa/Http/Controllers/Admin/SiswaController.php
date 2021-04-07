<?php

namespace Modules\Siswa\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;
use Modules\Siswa\Entities\Siswa;
use Modules\Siswa\Entities\Jurusan;

use Modules\Siswa\Http\Requests\CreateSiswaRequest;
use Modules\Siswa\Http\Requests\UpdateSiswaRequest;
use Modules\Siswa\Repositories\SiswaRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class SiswaController extends AdminBaseController
{
    /**
     * @var SiswaRepository
     */
    private $siswa;

    public function __construct(SiswaRepository $siswa)
    {
        parent::__construct();

        $this->siswa = $siswa;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $siswas = Siswa::with('jurusan')->get();

        return view('siswa::admin.siswas.index', compact('siswas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $jurusan = Jurusan::all();
        return view('siswa::admin.siswas.create' , ['jurusan' => $jurusan]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateSiswaRequest $request
     * @return Response
     */
    public function store(CreateSiswaRequest $request)
    {

        $data = $request->all();
        $gambar = $request->file('gambar');
        $data['gambar'] = time().'_'.$gambar->getClientOriginalName();
        $gambar->move('gambar' , $data['gambar']);

        $this->siswa->create($data);
        return redirect()->route('admin.siswa.siswa.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('siswa::siswas.title.siswas')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Siswa $siswa
     * @return Response
     */
    public function edit(Siswa $siswa)
    {
        $jurusan = Jurusan::all();
        return view('siswa::admin.siswas.edit', [
            'jurusan' => $jurusan,
            'siswa' => $siswa
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Siswa $siswa
     * @param  UpdateSiswaRequest $request
     * @return Response
     */
    public function update(Siswa $siswa, UpdateSiswaRequest $request)
    {
        $data = [];
        if(empty($request->file('gambar'))){
            $data = $request->except(['gambar']);
        }else{
            $data = $request->all();
            $gambar = $request->file('gambar');
            $data['gambar'] = time().'_'.$gambar->getClientOriginalName();
            $gambar->move('gambar' , $data['gambar']);
        }
        $this->siswa->update($siswa, $data);

        return redirect()->route('admin.siswa.siswa.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('siswa::siswas.title.siswas')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Siswa $siswa
     * @return Response
     */
    public function destroy(Siswa $siswa)
    {
        $this->siswa->destroy($siswa);

        return redirect()->route('admin.siswa.siswa.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('siswa::siswas.title.siswas')]));
    }
}
