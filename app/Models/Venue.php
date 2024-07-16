<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Venue extends Model
{
    use HasFactory, Sortable;

    protected $fillable = ['name'];
    protected $sorable = ['id' , 'name'];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
