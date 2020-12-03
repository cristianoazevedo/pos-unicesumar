<?php
declare(strict_types=1);

namespace Application\Model\Task;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Task extends Eloquent
{
    protected $table = 'task';
    protected $fillable = ['description', 'done'];
    protected $primaryKey = 'id';
    protected $dates = ['created_at', 'updated_at'];
}
