<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // PENTING

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'debt_amount', 'payment_amount', 'transaction_date', 'description', 'type',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
