<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Permission;

class HistoryEventsBreadTypeSeeder extends Seeder
{
    public function run()
    {
        // Create DataType
        $dataType = DataType::firstOrNew(['slug' => 'history_events']);
        if (!$dataType->exists) {
            $dataType->fill([
                'name' => 'history_events',
                'display_name_singular' => 'History Event',
                'display_name_plural' => 'History Events',
                'icon' => 'voyager-calendar',
                'model_name' => 'App\\Models\\HistoryEvent',
                'controller' => '',
                'generate_permissions' => 1,
                'description' => '',
                'server_side' => 1,
                'order_column' => 'year',
                'order_display_column' => 'year',
                'order_direction' => 'asc',
                'details' => [
                    'order_column' => 'year',
                    'order_display_column' => 'year',
                    'order_direction' => 'asc',
                    'default_search_key' => null,
                ]
            ])->save();
        }

        // Create permissions
        Permission::generateFor('history_events');

        // Create menu item
        $menu = Menu::where('name', 'admin')->firstOrFail();
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title' => 'History Events',
            'url' => '/admin/history-events',
            'route' => null,
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target' => '_self',
                'icon_class' => 'voyager-calendar',
                'color' => null,
                'parent_id' => null,
                'order' => 99,
            ])->save();
        }
    }
}