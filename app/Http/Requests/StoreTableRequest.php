<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreTableRequest extends Request
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
        $rules = [
            'name' => 'required|min:3|max:40',
            'visible' => 'required|boolean',
            'fields' => 'required|array'
        ];
        foreach($this->request->get('fields') as $key => $val){
            $rules['fields.'.$key.'.name'] = 'required|string|min:3|max:40';
            $rules['fields.'.$key.'.type'] = 'required|in:string,text,integer';
        }
        return $rules;
    }
}
