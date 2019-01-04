<?php

namespace App\Http\Requests\Votes;

use Illuminate\Foundation\Http\FormRequest;
use App\Domain\Votes\Validators\VoteValidator;

class VoteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user() && $this->user()->can('vote', $this->route('post'));
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @param VoteValidator $validator
     * @return array
     */
    public function rules(VoteValidator $validator)
    {
        return [];
    }
}
