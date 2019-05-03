<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\MenuItem;
use Illuminate\Http\Request;

use Illuminate\Support\Arr;
class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
    }

    public function builder($id)
    {
        $menu = Menu::findOrFail($id);
        // $this->authorize('edit', $menu);
        $isModelTranslatable = false; //is_bread_translatable(Voyager::model('MenuItem'));
        return view('menus.builder', compact('menu', 'isModelTranslatable'));
    }
    public function delete_menu($menu, $id)
    {
        $item = MenuItem::findOrFail($id);
        // $this->authorize('delete', $item);
        // $item->deleteAttributeTranslation('title');
        $item->destroy($id);
        return redirect()
            ->route('menus.builder', [$menu])
            ->with([
                'message'    => __('menu_builder.successfully_deleted'),
                'alert-type' => 'success',
            ]);
    }
    public function add_item(Request $request)
    {
        // $menu = Voyager::model('Menu');
        // $this->authorize('add', $menu);
        $data = $this->prepareParameters(
            $request->all()
        );
        unset($data['id']);
        $data['order'] = (new MenuItem)->highestOrderMenuItem();
        // Check if is translatable
        // $_isTranslatable = is_bread_translatable(Voyager::model('MenuItem'));
        // if ($_isTranslatable) {
        //     // Prepare data before saving the menu
        //     $trans = $this->prepareMenuTranslations($data);
        // }
        $menuItem = MenuItem::create($data);
        // Save menu translations
        // if ($_isTranslatable) {
        //     $menuItem->setAttributeTranslations('title', $trans, true);
        // }
        return redirect()
            ->route('menus.builder', [$data['menu_id']])
            ->with([
                'message'    => __('menu_builder.successfully_created'),
                'alert-type' => 'success',
            ]);
    }
    public function update_item(Request $request)
    {
        $id = $request->input('id');
        $data = $this->prepareParameters(
            $request->except(['id'])
        );
        $menuItem = MenuItem::findOrFail($id);
        // $this->authorize('edit', $menuItem->menu);
        // if (is_bread_translatable($menuItem)) {
        //     $trans = $this->prepareMenuTranslations($data);
        //     // Save menu translations
        //     $menuItem->setAttributeTranslations('title', $trans, true);
        // }
        $menuItem->update($data);
        return redirect()
            ->route('menus.builder', [$menuItem->menu_id])
            ->with([
                'message'    => __('menu_builder.successfully_updated'),
                'alert-type' => 'success',
            ]);
    }
    public function order_item(Request $request)
    {
        $menuItemOrder = json_decode($request->input('order'));
        $this->orderMenu($menuItemOrder, null);
    }
    private function orderMenu(array $menuItems, $parentId)
    {
        foreach ($menuItems as $index => $menuItem) {
            $item = MenuItem::findOrFail($menuItem->id);
            $item->order = $index + 1;
            $item->parent_id = $parentId;
            $item->save();
            if (isset($menuItem->children)) {
                $this->orderMenu($menuItem->children, $item->id);
            }
        }
    }
    protected function prepareParameters($parameters)
    {
        switch (Arr::get($parameters, 'type')) {
            case 'route':
                $parameters['url'] = null;
                break;
            default:
                $parameters['route'] = null;
                $parameters['parameters'] = '';
                break;
        }
        if (isset($parameters['type'])) {
            unset($parameters['type']);
        }
        return $parameters;
    }
}
