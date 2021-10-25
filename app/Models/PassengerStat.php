<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class PassengerStat
 * @package App\Models
 * @version October 25, 2021, 1:51 am UTC
 *
 * @property string $name
 * @property string $lastname
 * @property string $address
 * @property integer $number
 * @property integer $age
 */
class PassengerStat extends Model
{
//    use SoftDeletes;

    use HasFactory;

    public $table = 'passengerstats';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'lastname',
        'address',
        'number',
        'age'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'lastname' => 'string',
        'address' => 'string',
        'number' => 'integer',
        'age' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'number' => 'required|integer',
        'age' => 'required|integer',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];


}
