<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Table;

class StoreContentRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [];
        $type = $this->get('type');
        $table = Table::where('name', $type)->firstOrFail();
        foreach($table->fields as $field){
            $rules[$field['name']] = 'required';
        }
        return $rules;
    }
}
