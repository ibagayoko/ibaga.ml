<?php
use Illuminate\Database\Seeder;
use App\Models\Menu;
use App\Models\MenuItem;

class MenuItemsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $menu = Menu::where('name', 'home')->firstOrFail();
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('menu_items.dashboard'),
            'url'     => '',
            'route'   => 'dashboard',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'boat',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 1,
            ])->save();
        }
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('menu_items.media'),
            'url'     => '',
            'route'   => 'media.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'images',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 5,
            ])->save();
        }
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('menu_items.users'),
            'url'     => '',
            'route'   => 'users.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'person',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 3,
            ])->save();
        }
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('menu_items.roles'),
            'url'     => '',
            'route'   => 'roles.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'lock',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 2,
            ])->save();
        }
        $toolsMenuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('menu_items.tools'),
            'url'     => '',
        ]);
        if (!$toolsMenuItem->exists) {
            $toolsMenuItem->fill([
                'target'     => '_self',
                'icon_class' => 'tools',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 9,
            ])->save();
        }
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('menu_items.menu_builder'),
            'url'     => '',
            'route'   => 'menus.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'list',
                'color'      => null,
                'parent_id'  => $toolsMenuItem->id,
                'order'      => 10,
            ])->save();
        }
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('menu_items.database'),
            'url'     => '',
            'route'   => 'database.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'data',
                'color'      => null,
                'parent_id'  => $toolsMenuItem->id,
                'order'      => 11,
            ])->save();
        }
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('menu_items.compass'),
            'url'     => '',
            'route'   => 'compass.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'compass',
                'color'      => null,
                'parent_id'  => $toolsMenuItem->id,
                'order'      => 12,
            ])->save();
        }
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('menu_items.bread'),
            'url'     => '',
            'route'   => 'bread.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'bread',
                'color'      => null,
                'parent_id'  => $toolsMenuItem->id,
                'order'      => 13,
            ])->save();
        }
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('menu_items.settings'),
            'url'     => '',
            'route'   => 'settings.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'settings',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 14,
            ])->save();
        }
    }
}