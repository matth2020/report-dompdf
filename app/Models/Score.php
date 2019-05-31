<?php

namespace App\Models;

use Illuminate\Validation\Validator;

/**
 * Class Score.
 *
 *
 * @SWG\Definition(
 *   definition="Score"
 * )
 */
class Score extends BaseModel
{
    /**
    * The database table used by the model.
    *
    * @var string
    */
    protected $table = 'score';

    /**
     * The database primary_key used by the model.
     *
     * @var string
     */
    protected $primaryKey = 'score_id';

    /**
     * Turn off timestamps.
     *
     * @var array
     */
    public $timestamps = false;

    /**
    * An array of fields that need to be converted from one name
    * in the database (array index) to another in the json object (value).
    */
    public static $DBtoRestConversion = array();

    protected function makeValidationRules($id, $data = null)
    {
        // Keep validation intentially loose... if it fits in the db
        // we should accept it... some log is better than no log.
        // We will trim strings if necessary in the controller.
        $Rules = [
        ];
        return $Rules;
    }

    protected function attachSometimesRules($Validator, $id)
    {
        $Validator->sometimes(['name'], 'required', function () use ($id) {
            return is_null($id);
        });

        return $Validator;
    }
}
