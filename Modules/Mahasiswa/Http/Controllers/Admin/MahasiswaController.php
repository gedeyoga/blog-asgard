<?php

namespace Modules\Mahasiswa\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Mahasiswa\Entities\Mahasiswa;
use Modules\Mahasiswa\Http\Requests\CreateMahasiswaRequest;
use Modules\Mahasiswa\Http\Requests\UpdateMahasiswaRequest;
use Modules\Mahasiswa\Repositories\MahasiswaRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class MahasiswaController extends AdminBaseController
{
    /**
     * @var MahasiswaRepository
     */
    private $mahasiswa;

    public function __construct(MahasiswaRepository $mahasiswa)
    {
        parent::__construct();

        $this->mahasiswa = $mahasiswa;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //$mahasiswas = $this->mahasiswa->all();

        return view('mahasiswa::admin.mahasiswas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('mahasiswa::admin.mahasiswas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateMahasiswaRequest $request
     * @return Response
     */
    public function store(CreateMahasiswaRequest $request)
    {
        $this->mahasiswa->create($request->all());

        return redirect()->route('admin.mahasiswa.mahasiswa.index')
            ->withSuccess(trans('core::core.messages.resource created', ['name' => trans('mahasiswa::mahasiswas.title.mahasiswas')]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Mahasiswa $mahasiswa
     * @return Response
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        return view('mahasiswa::admin.mahasiswas.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Mahasiswa $mahasiswa
     * @param  UpdateMahasiswaRequest $request
     * @return Response
     */
    public function update(Mahasiswa $mahasiswa, UpdateMahasiswaRequest $request)
    {
        $this->mahasiswa->update($mahasiswa, $request->all());

        return redirect()->route('admin.mahasiswa.mahasiswa.index')
            ->withSuccess(trans('core::core.messages.resource updated', ['name' => trans('mahasiswa::mahasiswas.title.mahasiswas')]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Mahasiswa $mahasiswa
     * @return Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        $this->mahasiswa->destroy($mahasiswa);

        return redirect()->route('admin.mahasiswa.mahasiswa.index')
            ->withSuccess(trans('core::core.messages.resource deleted', ['name' => trans('mahasiswa::mahasiswas.title.mahasiswas')]));
    }
}
