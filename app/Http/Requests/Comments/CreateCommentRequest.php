<?php

namespace App\Http\Requests\Comments;

use Illuminate\Foundation\Http\FormRequest;
use App\Domain\Comments\Validators\CommentValidator;

class CreateCommentRequest extends FormRequest
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
     * @param CommentValidator $validator
     * @return array
     */
    public function rules(CommentValidator $validator)
    {
        return $validator->getRules();
    }
}
