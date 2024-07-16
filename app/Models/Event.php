<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Event extends Model
{
    use HasFactory, Sortable;

    protected $fillable = ['title', 'poster', 'event_date', 'venue_id'];

    public $sortable = ['id', 'title', 'event_date'];


    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }

}
