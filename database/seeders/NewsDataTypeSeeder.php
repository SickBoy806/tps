<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;
use TCG\Voyager\Models\Permission;

class NewsDataTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Data Type
        $this->call(NewsDataTypeSeeder::class);
        $dataType = $this->dataType('slug', 'news');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'news',
                'display_name_singular' => 'News Article',
                'display_name_plural'   => 'News Articles',
                'icon'                  => 'voyager-news',
                'model_name'            => 'App\\Models\\News',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
                'server_side'           => 1,
            ])->save();
        }

        // Add DataRows
        $this->addDataRows($dataType);

        // Add Menu Item
        $menu = Menu::where('name', 'admin')->firstOrFail();
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'News Articles',
            'url'     => '',
            'route'   => 'voyager.news.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-news',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 5,
            ])->save();
        }

        // Add Permissions
        $this->addPermissions();
    }

    protected function dataType($field, $for)
    {
        return DataType::firstOrNew([$field => $for]);
    }
    
    protected function addDataRows($dataType)
    {
        $rows = [
            // ID
            [
                'field' => 'id',
                'type' => 'number',
                'display_name' => 'ID',
                'required' => 1,
                'browse' => 0,
                'read' => 0,
                'edit' => 0,
                'add' => 0,
                'delete' => 0,
            ],
            // Title
            [
                'field' => 'title',
                'type' => 'text',
                'display_name' => 'Title',
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
            ],
            // Slug
            [
                'field' => 'slug',
                'type' => 'text',
                'display_name' => 'Slug',
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => json_encode([
                    'slugify' => [
                        'origin' => 'title',
                        'forceUpdate' => true,
                    ],
                ]),
            ],
            // Category
            [
                'field' => 'category',
                'type' => 'select_dropdown',
                'display_name' => 'Category',
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => json_encode([
                    'default' => 'Research',
                    'options' => [
                        'Research' => 'Research',
                        'Academic' => 'Academic',
                        'Technology' => 'Technology',
                        'Events' => 'Events',
                        'Partnerships' => 'Partnerships',
                    ],
                ]),
            ],
            // Excerpt
            [
                'field' => 'excerpt',
                'type' => 'text_area',
                'display_name' => 'Excerpt',
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
            ],
            // Body
            [
                'field' => 'body',
                'type' => 'rich_text_box',
                'display_name' => 'Body',
                'required' => 1,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
            ],
            // Read Time
            [
                'field' => 'read_time',
                'type' => 'text',
                'display_name' => 'Read Time',
                'required' => 0,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => json_encode([
                    'default' => '5 min read',
                ]),
            ],
            // Published Date
            [
                'field' => 'published_at',
                'type' => 'timestamp',
                'display_name' => 'Published Date',
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
            ],
            // Featured Image
            [
                'field' => 'featured_image',
                'type' => 'image',
                'display_name' => 'Featured Image',
                'required' => 0,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
            ],
            // Images
            [
                'field' => 'images',
                'type' => 'multiple_images',
                'display_name' => 'Slideshow Images',
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
            ],
            // Status
            [
                'field' => 'status',
                'type' => 'select_dropdown',
                'display_name' => 'Status',
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => json_encode([
                    'default' => 'DRAFT',
                    'options' => [
                        'PUBLISHED' => 'Published',
                        'DRAFT' => 'Draft',
                        'PENDING' => 'Pending',
                    ],
                ]),
            ],
            // Created At
            [
                'field' => 'created_at',
                'type' => 'timestamp',
                'display_name' => 'Created At',
                'required' => 0,
                'browse' => 0,
                'read' => 0,
                'edit' => 0,
                'add' => 0,
                'delete' => 0,
            ],
            // Updated At
            [
                'field' => 'updated_at',
                'type' => 'timestamp',
                'display_name' => 'Updated At',
                'required' => 0,
                'browse' => 0,
                'read' => 0,
                'edit' => 0,
                'add' => 0,
                'delete' => 0,
            ],
        ];

        foreach ($rows as $row) {
            $dataRow = $dataType->rows()->firstOrNew(['field' => $row['field']]);
            $dataRow->fill($row)->save();
        }
    }
    
    protected function addPermissions()
    {
        // Add permissions
        foreach(['browse', 'read', 'edit', 'add', 'delete'] as $action) {
            Permission::firstOrCreate([
                'key'        => $action . '_news',
                'table_name' => 'news',
            ]);
        }
    }
}