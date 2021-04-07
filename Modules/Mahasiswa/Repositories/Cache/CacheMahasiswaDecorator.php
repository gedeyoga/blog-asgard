<?php

namespace Modules\Mahasiswa\Repositories\Cache;

use Modules\Mahasiswa\Repositories\MahasiswaRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheMahasiswaDecorator extends BaseCacheDecorator implements MahasiswaRepository
{
    public function __construct(MahasiswaRepository $mahasiswa)
    {
        parent::__construct();
        $this->entityName = 'mahasiswa.mahasiswas';
        $this->repository = $mahasiswa;
    }
}
