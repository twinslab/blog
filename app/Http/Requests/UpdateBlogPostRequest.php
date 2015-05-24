<?php namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Post;

class UpdateBlogPostRequest extends Request {

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
        // works but bad practice: $post_id = $this->segment(3);
        // shorter syntaxes: $this->route('posts'), $this->posts
        $post_id = $this->route()->getParameter('posts');

        return [
            'title' => 'required|unique:posts,title,'.$post_id.'|max:255',
            'slug' => 'required|unique:posts,slug,'.$post_id.'|max:255|alpha_dash',
            'content_md' => 'required',
            'tags' => 'exists:tags,name'
        ];
	}

	/**
	 * Overwrite the response method so we are able to pass a custom error message.
	 *
	 * {@inheritdoc}
	 */
	public function response(array $errors)
	{
		flash()->error('There errors. Please fix them.');

		return $this->redirector->to($this->getRedirectUrl())
			->withInput($this->except($this->dontFlash))
			->withErrors($errors, $this->errorBag);
	}

}
