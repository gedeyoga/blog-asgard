<?php

namespace Modules\Siswa\Repositories\Cache;

use Modules\Siswa\Repositories\SiswaRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheSiswaDecorator extends BaseCacheDecorator implements SiswaRepository
{
    public function __construct(SiswaRepository $siswa)
    {
        parent::__construct();
        $this->entityName = 'siswa.siswas';
        $this->repository = $siswa;
    }
}
