<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Payment",
 *      required={},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="invoiceno",
 *          description="invoiceno",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="invoicedate",
 *          description="invoicedate",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="terms",
 *          description="terms",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="duedate",
 *          description="duedate",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="billto",
 *          description="billto",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="quantity",
 *          description="quantity",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="price",
 *          description="price",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="amount",
 *          description="amount",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="subtotal",
 *          description="subtotal",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="total",
 *          description="total",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="notes",
 *          description="notes",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class Payment extends Model
{
    use SoftDeletes;

    public $table = 'payments';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'invoiceno',
        'invoicedate',
        'terms',
        'duedate',
        'billto',
        'description',
        'quantity',
        'price',
        'amount',
        'subtotal',
        'total',
        'notes'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'invoiceno' => 'string',
        'invoicedate' => 'date',
        'terms' => 'string',
        'duedate' => 'date',
        'billto' => 'string',
        'description' => 'string',
        'quantity' => 'string',
        'price' => 'string',
        'amount' => 'string',
        'subtotal' => 'string',
        'total' => 'string',
        'notes' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
