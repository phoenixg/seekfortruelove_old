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


	public static function profile($uid){
	        return DB::table('users')
		            ->join('static_ethnics', 'users.ethnic', '=', 'static_ethnics.id')
		            ->join('static_marriages', 'users.marriage', '=', 'static_marriages.id')
		            ->join('static_livings', 'users.living', '=', 'static_livings.id')
		            ->join('static_districts', 'users.district', '=', 'static_districts.id')
		            ->join('static_industries', 'users.industry', '=', 'static_industries.id')
		            ->join('static_companytypes', 'users.companytype', '=', 'static_companytypes.id')
		            ->join('static_academics', 'users.academic', '=', 'static_academics.id')
		            ->join('static_nationalities', 'users.nationality', '=', 'static_nationalities.id')
		            ->join('static_professions', 'users.profession', '=', 'static_professions.id')
		            ->join('static_salaries', 'users.salary', '=', 'static_salaries.id')
		            ->where('users.id', '=', $uid)
		            ->first(array(
			                'users.id',
			                'users.nickname',
			                'users.sex',
			                'users.height',
			                'users.weight',
			                'users.born',
			                'users.school',
			                'users.major',
			                'users.blog',
			                'static_ethnics.name as ethnic',
			                'static_marriages.status as marriage',
			                'static_livings.status as living',
			                'static_districts.district as district',
			                'static_industries.type as industry',
			                'static_companytypes.type as companytype',
			                'static_academics.academic as academic',
			                'static_nationalities.nationality as nationality',
			                'static_professions.profession as profession',
			                'static_salaries.range as salary'
		               	 )
	        		);
	}

}
