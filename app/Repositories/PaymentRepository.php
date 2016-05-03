<?php

namespace App\Repositories;

use App\Models\Payment;
use InfyOm\Generator\Common\BaseRepository;

class PaymentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'invoiceno',
        'invoicedate',
        'terms',
        'duedate',
        'billto',
        'description',
        'quantity',
        'price',
        'amount',
        'total',
        'notes'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Payment::class;
    }
}
