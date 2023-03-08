<?php

namespace Itszun\BackupOnDelete\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Itszun\PhpCommon\Cherrypickable;
use Itszun\PhpCommon\HasActionButton;

class DeletedCollection extends Model
{
    use HasFactory, HasActionButton, Cherrypickable;

    protected $guarded = ["id"];

    public $casts = [
        "created_at" => "datetime"
    ];

    public function actionButtonOptions()
    {
        return [
            "Hapus" => [
                "url" => route('admin.recycle.destroy', $this->id),
                "type" => "form",
                "icon" => "fa fa-trash"
            ]
        ];
    }
}
