<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 
        'address', 
        'phone', 
        'email', 
        'branch_type_id', 
        'region_id', 
        'manager_id', 
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function type()
    {
        return $this->belongsTo(BranchType::class, 'branch_type_id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function manager()
    {
        return $this->belongsTo(User::class, 'manager_id');
    }
}
