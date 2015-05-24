<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\User;

class StoreBlogPostRequest extends Request {

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
		return [
			'title' => 'required|unique:posts|max:255',
            'slug' => 'required|unique:posts|max:255|alpha_dash',
            'content_md' => 'required',
            'tags' => 'exists:tags,name'
		];
	}

}
