<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttachmentModel extends Model
{
    protected $table = "attachments";
    protected $primaryKey = "id";
    protected $fillable = ["file_path", "ticket_id","created_at","updated_at","deleted_at"];
}
