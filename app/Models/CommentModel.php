<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentModel extends Model
{
    protected $table = "comments";
    protected $primaryKey = "id";
    protected $fillable = ["content", "user_id", "ticket_id","created_at","updated_at","deleted_at"];


}
