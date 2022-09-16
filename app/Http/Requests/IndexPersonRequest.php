<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndexPersonRequest extends FormRequest
{
    public function prepareForValidation()
    {
        $valueWithoutSpace = str_ireplace(' ', '', $this->age);

        if(!$this->age){
            $this->replace([
                'operator' => null,
                'age' => null
            ]);

            return;
        }

        if (is_numeric($valueWithoutSpace)) {
            $this->replace([
                'operator' => '',
                'age' => (int) $valueWithoutSpace
            ]);

            return;
        }

        if (is_numeric($valueWithoutSpace[0])) {
            $this->replace([
                'operator' => (int) $this->age[0],
                'age' => (int) substr($valueWithoutSpace, 1)
            ]);

            return;
        }

        $this->replace([
            'operator' => $this->age[0],
            'age' => substr($valueWithoutSpace, 1)
        ]);

        return;
    }

    public function rules()
    {
        return [
            'operator' => ['nullable', 'string'],
            'age' => ['nullable','integer', 'required_if:operator,>']
        ];
    }
}
