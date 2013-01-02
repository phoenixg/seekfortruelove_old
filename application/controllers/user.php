<?php

class User_Controller extends Base_Controller
{
    public function __construct() {
        $this->filter('before', 'auth');
    }

    public $restful = true;

    public function get_search() {
        return View::make('search');
            //->with('users', User::all());
    }

    public function post_search() { 
        
        $qHeightSmaller = (int) Input::get('qHeightSmaller');
        $qHeightTaller  = (int) Input::get('qHeightTaller');

        $qSalaryLow     = (int) Input::get('qSalaryLow');
        $qSalaryHigh    = (int) Input::get('qSalaryHigh');
        if ($qSalaryLow < 1000) {
            $qSalaryLow = 1;
        } elseif ($qSalaryLow < 1900) {
            $qSalaryLow = 2;
        } elseif ($qSalaryLow < 2900) {
            $qSalaryLow = 3;
        } elseif ($qSalaryLow < 3900) {
            $qSalaryLow = 4;
        } elseif ($qSalaryLow < 4900) {
            $qSalaryLow = 5;
        } elseif ($qSalaryLow < 5900) {
            $qSalaryLow = 6;
        } elseif ($qSalaryLow < 6900) {
            $qSalaryLow = 7;
        } elseif ($qSalaryLow < 7900) {
            $qSalaryLow = 8;
        } elseif ($qSalaryLow < 8900) {
            $qSalaryLow = 9;
        } elseif ($qSalaryLow < 9900) {
            $qSalaryLow = 10;
        } elseif ($qSalaryLow < 11900) {
            $qSalaryLow = 11;
        } elseif ($qSalaryLow < 14900) {
            $qSalaryLow = 12;
        } elseif ($qSalaryLow < 19900) {
            $qSalaryLow = 13;
        } elseif ($qSalaryLow < 29900) {
            $qSalaryLow = 14;
        } elseif ($qSalaryLow < 30000) {
            $qSalaryLow = 15;
        }
        
        if ($qSalaryHigh < 1000) {
            $qSalaryHigh = 1;
        } elseif ($qSalaryHigh < 1900) {
            $qSalaryHigh = 2;
        } elseif ($qSalaryHigh < 2900) {
            $qSalaryHigh = 3;
        } elseif ($qSalaryHigh < 3900) {
            $qSalaryHigh = 4;
        } elseif ($qSalaryHigh < 4900) {
            $qSalaryHigh = 5;
        } elseif ($qSalaryHigh < 5900) {
            $qSalaryHigh = 6;
        } elseif ($qSalaryHigh < 6900) {
            $qSalaryHigh = 7;
        } elseif ($qSalaryHigh < 7900) {
            $qSalaryHigh = 8;
        } elseif ($qSalaryHigh < 8900) {
            $qSalaryHigh = 9;
        } elseif ($qSalaryHigh < 9900) {
            $qSalaryHigh = 10;
        } elseif ($qSalaryHigh < 11900) {
            $qSalaryHigh = 11;
        } elseif ($qSalaryHigh < 14900) {
            $qSalaryHigh = 12;
        } elseif ($qSalaryHigh < 19900) {
            $qSalaryHigh = 13;
        } elseif ($qSalaryHigh < 29900) {
            $qSalaryHigh = 14;
        } elseif ($qSalaryHigh <= 30000) {
            $qSalaryHigh = 15;
        }   
        
        $qBornYoung        = date('Y') - (int) Input::get('qAgeYoung');
        $qBornOld          = date('Y') - (int) Input::get('qAgeOld');
        
        $qAcademicLow      = (int) Input::get('qAcademicLow');
        $qAcademicHigh     = (int) Input::get('qAcademicHigh');

        $qSex              = Input::get('qSex');
        $qNationalityStr   = Input::get('qNationality');
        $qNationalityArr   = explode(',', $qNationalityStr);

        $qDistrictStr      = Input::get('qDistrict');
        $qDistrictArr      = explode(',', $qDistrictStr);

        $users = DB::table('users')
                    ->where('height',         '>=',  $qHeightSmaller)
                    ->where('height',         '<=',  $qHeightTaller)
                    ->where('born',           '>=',  $qBornOld)
                    ->where('born',           '<=',  $qBornYoung)
                    ->where('salary',         '>=',  $qSalaryLow)
                    ->where('salary',         '<=',  $qSalaryHigh)
                    ->where('academic',       '>=',  $qAcademicLow)
                    ->where('academic',       '<=',  $qAcademicHigh)
                    ->where('sex',            '=',   $qSex)
                    ->where_in('nationality', $qNationalityArr)
                    ->where_in('district',    $qDistrictArr)
                    ->order_by('id',          'desc')
                    ->get();
                    //->get(array('id', 'nickname'));
                    //->get('id');

        return Response::json($users);
    }

    public function get_profile($id) {

        // 写进model里
        $user = DB::table('users')
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
            ->where('users.id', '=', $id)
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

        return View::make('profile')
            ->with('user', $user);
    }
}
