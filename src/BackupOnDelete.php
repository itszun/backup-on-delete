<?php

namespace Itszun\BackupOnDelete;

use Itszun\BackupOnDelete\Models\DeletedCollection;

trait BackupOnDelete {
    public static function bootBackupOnDelete() {
        $callback = function($model) {
            DeletedCollection::create([
                'deleted_from' => request()->getUri(),
                'deleted_by' => json_encode(optional(request()->user())->simple_info),
                'table_name' => $model->getTable(),
                'data' => json_encode($model)
            ]);
        };
        static::deleting($callback);
    }
}
