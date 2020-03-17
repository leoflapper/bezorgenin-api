<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Kitchen
 * @package App\Models
 * @version March 16, 2020, 7:13 pm UTC
 *
 * @property string name
 * @property string description
 */
class Kitchen extends Model
{
    use SoftDeletes;

    public $table = 'kitchens';


    protected $dates = ['deleted_at'];

    public $fillable = [
        'name',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function companies()
    {
        return $this->belongsToMany(\App\Models\Company::class);
    }

    public function toArray() {
        $result = parent::toArray();
        $result['companies'] = $this->companies()->getResults()->toArray();
        return $result;

    }




}
