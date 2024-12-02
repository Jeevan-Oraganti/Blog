<?php
// app/Models/Contact.php
namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'subject', 'message'];

    public function scopeFilter($query, array $filters)
    {
        return $this->where('name', 'like', '%' . request('search') . '%')
            ->orWhere('email', 'like', '%' . request('search') . '%')
            ->orWhere('subject', 'like', '%' . request('search') . '%')
            ->orWhere('message', 'like', '%' . request('search') . '%');
    }

    public function isLatest()
    {
        return $this->created_at->gt(Carbon::now()->subDays(1));
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
