<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'name', 'id_card', 'model_id','telephone','vehicle_reg_number','chasis_number','engine_number',
        'rating','color','agreed_unit','on_behalf','selling_price','amount_in_word','mode_of_payment',
        'first_installment','first_installment_date','second_installment','second_installment_date',
        'file1','file2','file3','file4'
    ];

}
