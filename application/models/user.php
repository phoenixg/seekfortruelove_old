<?php
      
class User extends Eloquent{

	public static $timestamps = true;
	
	public static $rules = array(
		'email'          => 'required|min:5|max:100|email|unique:users',
		'password'       => 'required|min:6|max:20|confirmed',
		'nickname'       => 'required|min:2|max:30|unique:users',
		'sex'            => 'required',
		'ethnic'         => 'required',
		'nationality'    => 'required',
		'height'         => 'required|between:140,230|integer',
		'weight'         => 'required|between:30,110|integer',
		'born'           => 'required|between:1950,1995|integer',
		'district'       => 'required',
		'marriage'       => 'required',
		'living'         => 'required',
		'academic'       => 'required',
		'school'         => 'required|min:2|max:50',
		'major'          => 'min:2|max:50',
		'industry'       => 'required',
		'profession'     => 'required',
		'companytype'    => 'required',
		'salary'         => 'required',
		'blog'           => 'min:2|max:100|active_url',
		'terms'          => 'accepted'		
	);

	public static $rules_update = array(
		'nickname'       => 'required|min:2|max:30',
		'sex'            => 'required',
		'ethnic'         => 'required',
		'nationality'    => 'required',
		'height'         => 'required|between:140,230|integer',
		'weight'         => 'required|between:30,110|integer',
		'born'           => 'required|between:1950,1995|integer',
		'district'       => 'required',
		'marriage'       => 'required',
		'living'         => 'required',
		'academic'       => 'required',
		'school'         => 'required|min:2|max:50',
		'major'          => 'min:2|max:50',
		'industry'       => 'required',
		'profession'     => 'required',
		'companytype'    => 'required',
		'salary'         => 'required',
		'blog'           => 'min:2|max:100'
	);

	public function images()
	{
		return $this->has_many('Image');
	}

	public static function validate($data) {
		return Validator::make($data, static::$rules);
	}

	public static function validate_update($data) {
		return Validator::make($data, static::$rules_update);
	}

}
