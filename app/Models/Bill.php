<?php

namespace App\Models;

use Database\Factories\BillFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Bill
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $order_item_id
 * @property float $amount
 * @property string $currency
 * @method static BillFactory factory(...$parameters)
 * @method static Builder|Bill newModelQuery()
 * @method static Builder|Bill newQuery()
 * @method static Builder|Bill query()
 * @method static Builder|Bill whereAmount($value)
 * @method static Builder|Bill whereCreatedAt($value)
 * @method static Builder|Bill whereCurrency($value)
 * @method static Builder|Bill whereId($value)
 * @method static Builder|Bill whereOrderItemId($value)
 * @method static Builder|Bill whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Bill extends Model
{
    use HasFactory;
}
