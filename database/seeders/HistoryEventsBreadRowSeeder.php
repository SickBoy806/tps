<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataRow;
use TCG\Voyager\Models\DataType;

class HistoryEventsBreadRowSeeder extends Seeder
{
    public function run()
    {
        $dataType = DataType::where('slug', 'history_events')->firstOrFail();

        $rows = [
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
            [
                'field' => 'year',
                'type' => 'number',
                'display_name' => 'Year',
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
            ],
            [
                'field' => 'month',
                'type' => 'number',
                'display_name' => 'Month',
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => json_encode([
                    'validation' => [
                        'rule' => 'min:1|max:12',
                    ],
                ]),
            ],
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
            [
                'field' => 'description',
                'type' => 'text_area',
                'display_name' => 'Description',
                'required' => 1,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
            ],
            [
                'field' => 'image',
                'type' => 'image',
                'display_name' => 'Image',
                'required' => 0,
                'browse' => 1,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => json_encode([
                    'resize' => [
                        'width' => '400',
                        'height' => '220',
                    ],
                    'quality' => '70%',
                    'upsize' => true,
                    'thumbnails' => [
                        [
                            'name' => 'medium',
                            'scale' => '50%',
                        ],
                    ],
                ]),
            ],
            [
                'field' => 'background',
                'type' => 'text',
                'display_name' => 'Background',
                'required' => 0,
                'browse' => 0,
                'read' => 1,
                'edit' => 1,
                'add' => 1,
                'delete' => 1,
                'details' => json_encode([
                    'default' => 'linear-gradient(165deg, #1E3A8A 0%, #1E40AF 100%)',
                ]),
            ],
        ];

        foreach ($rows as $row) {
            $dataRow = DataRow::firstOrNew([
                'data_type_id' => $dataType->id,
                'field' => $row['field'],
            ]);
            if (!$dataRow->exists) {
                $dataRow->fill($row)->save();
            }
        }
    }
}