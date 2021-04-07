<?php

namespace Modules\Siswa\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

use Modules\Siswa\Repositories\SiswaRepository;
use Modules\Siswa\Transformers\KategoriTransformer;
use Modules\Siswa\Entities\Kategori;
use Modules\Siswa\Http\Requests\CreateKategoriRequest;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    /**
     * @var SiswaRepository
     */
    // private $kategori;

    // public function __construct(SiswaRepository $kategori)
    // {
    //     $this->user = $kategori;
    // }

    public function index(Request $request)
    {
        $kategori = DB::table('siswa__kategories');
        if ($request->get('search') !== null) { 
            $term = $request->get('search');
            $kategori->where('nama_kategori', 'LIKE', "%{$term}%");
        }
        if ($request->get('order_by') !== null && $request->get('order') !== 'null') {
            $order = ($request->get('order') == 'ascending') ? 'asc' : 'desc';

            $kategori->orderBy($request->get('order_by'), $order);
        } else {
            $kategori->orderBy('created_at', 'desc');
        }

        $kategori = $kategori->paginate($request->get('per_page'));
        return KategoriTransformer::collection($kategori);
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('siswa::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(CreateKategoriRequest $request)
    {
        $data = $request->all();
        Kategori::create($data);

        return response()->json([
            'errors' => false,
            'message' => trans('siswa::siswas.kategori.messages.create kategori'),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy(Request $request)
    {
        Kategori::find($request->id)->delete();
        return response()->json([
            'errors' => false,
            'message' => 'Berhasil di hapus!',
        ]);
    }

    public function find(Request $request){
        $data = Kategori::find($request->kategori);
        return $data;
    }

    public function update(Request $request){
        $data = $request->except(['kategori']);
        Kategori::where('id' , $request->id)->update($data);

        return response()->json([
            'errors' => false,
            'message' => 'Berhasil di update!',
        ]);
    }
}
