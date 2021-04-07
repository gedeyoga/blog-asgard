<?php

namespace Modules\Siswa\Repositories;

use Modules\Core\Repositories\BaseRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;

interface KategoriRepository extends BaseRepository
{
    public function serverPaginationFilteringFor(Request $request) : LengthAwarePaginator;
}
