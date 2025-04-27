<?php
// For Voyager to recognize these models, you need to add them to the data_types table
// This is typically done via Voyager's BREAD system in the admin panel
// But you can also create seeders to automate this process

// database/seeders/VoyagerHealthCenterDataTypesSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Permission;

class VoyagerHealthCenterDataTypesSeeder extends Seeder
{
    public function run()
    {
        // Add Health Center Data Type
        $dataType = $this->dataType('slug', 'health-centers');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'health_centers',
                'display_name_singular' => 'Health Center',
                'display_name_plural'   => 'Health Centers',
                'icon'                  => 'voyager-hospital',
                'model_name'            => 'App\\Models\\HealthCenter',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => 'Health center main information'
            ])->save();
        }

        // Add Health Center Service Data Type
        $dataType = $this->dataType('slug', 'health-center-services');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'health_center_services',
                'display_name_singular' => 'Health Center Service',
                'display_name_plural'   => 'Health Center Services',
                'icon'                  => 'voyager-categories',
                'model_name'            => 'App\\Models\\HealthCenterService',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => 'Services offered by the health center'
            ])->save();
        }

        // Create permissions
        Permission::generateFor('health_centers');
        Permission::generateFor('health_center_services');

        // Add to menu
        $menu = Menu::where('name', 'admin')->firstOrFail();
        
        // Add Health Center menu item
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Health Center',
            'url'     => '',
            'route'   => 'voyager.health-centers.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-hospital',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 99,
            ])->save();
        }

        // Add Health Center Services menu item
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Health Center Services',
            'url'     => '',
            'route'   => 'voyager.health-center-services.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-categories',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 100,
            ])->save();
        }
    }

    protected function dataType($field, $for)
    {
        return DataType::firstOrNew([$field => $for]);
    }
}