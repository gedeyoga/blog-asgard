<?php

namespace Modules\Siswa\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterSiswaSidebar implements \Maatwebsite\Sidebar\SidebarExtender
{
    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @param Authentication $auth
     *
     * @internal param Guard $guard
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    public function handle(BuildingSidebar $sidebar)
    {
        $sidebar->add($this->extendWith($sidebar->getMenu()));
    }

    /**
     * @param Menu $menu
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item(trans('siswa::siswas.title.siswas'), function (Item $item) {
                $item->icon('fa fa-copy');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('siswa::siswas.title.siswas'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->route('admin.siswa.siswa.index');
                    $item->authorize(
                        $this->auth->hasAccess('siswa.siswas.index')
                    );
                });
                $item->item(trans('siswa::siswas.jurusan.title.jurusans'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(1);
                    $item->route('admin.siswa.jurusan.index');
                    $item->authorize(
                        $this->auth->hasAccess('jurusan.jurusans.index')
                    );
                });
                $item->item( 'Test', function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(2);
                    $item->route('admin.siswa.test.index');
                    $item->authorize(
                        $this->auth->hasAccess('test.tests.index')
                    );
                });
                $item->item( trans('siswa::siswas.kategori.title.kategories'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(2);
                    $item->route('admin.siswa.kategori.index');
                    $item->authorize(
                        $this->auth->hasAccess('kategori.kategories.index')
                    );
                });
// append

            });
        });

        return $menu;
    }
}
