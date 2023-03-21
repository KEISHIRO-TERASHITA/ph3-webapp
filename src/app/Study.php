<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    //
    protected $fillable = 
    [
        'hours', 'user_id', 'created_at', 'updated_at',
    ];

    public function scopeMonth($query)
    {
        $first_date = date("Y-m-01");
        $last_date = date("Y-m-t");
        return $query->where('date', '>=', $first_date . ' 00:00:00')->where('date', '<=', $last_date . ' 23:59:59');
    }
    public function scopeDate($query)
    {
        $today = date('Y-m-d');
        return $query->where('date', '>=', $today . ' 00:00:00')->where('date', '<=', $today . ' 23:59:59');
    }

    public function searchData($date)
    {
        if(strpos($this->date, date('Y-m-' . $date)) !== false)
        {
            return $this->hours;
        }
        else
        {
            return 0;
        }
    }

    public function contents()
    {
        return $this->belongsToMany(Content::class);
    }
    public function languages()
    {
        return $this->belongsToMany(Language::class);
    }
}
