<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketModel extends Model
{
    protected $table = "tickets";
    protected $primaryKey = "id";
    protected $fillable = ["title","description","status", "user_id","category_id","responsible_user_id","created_at","updated_at","deleted_at"];

}
