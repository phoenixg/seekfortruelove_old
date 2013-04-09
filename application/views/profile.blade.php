@layout('layouts.default')
@section('page_styles_header')
    {{ HTML::style('css/profile.css') }}
    {{ HTML::style('css/jquery....css') }}
@endsection
@section('page_scripts_header')
    {{ HTML::script('js/jquery....js') }}
    {{ HTML::script('js/profile.js') }}
@endsection
@section('page_scripts_footer')

@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="span2">
            <ul id="thumbnails" class="thumbnails">
                <li>
                    {{ HTML::image('/images/profile/icon/'.$user->id.'.jpg', '', array()) }}
                </li>
            </ul>
        </div>

        <div class="span10" id="profile-info">
            <div class="row">
                <div class="span4"><strong>昵称:&nbsp;</strong>{{ $user->nickname }}</div>
                <div class="span2"><strong>性别:&nbsp;</strong>{{ $user->sex }}</div>
                <div class="span2"><strong>民族:&nbsp;</strong>{{ $user->ethnic }}</div>
                <div class="span2"><strong>籍贯:&nbsp;</strong>{{ $user->nationality }}</div>
            </div>
            <div class="row">
                <div class="span2"><strong>身高/体重:&nbsp;</strong>{{ $user->height }}/{{ $user->weight }}</div>
                <div class="span2"><strong>出生年份/年龄:&nbsp;</strong>{{ $user->born }}/25</div>
                <div class="span2"><strong>婚姻状况:&nbsp;</strong>{{ $user->marriage }}</div>
                <div class="span2"><strong>常住区域:&nbsp;</strong>{{ $user->district }}</div>
                <div class="span2"><strong>住房情况:&nbsp;</strong>{{ $user->living }}</div>
            </div>
            <div class="row">
                <div class="span2"><strong>最高学历:&nbsp;</strong>{{ $user->academic }}</div>
                <div class="span2"><strong>专业:&nbsp;</strong>{{ $user->major }}</div>
                <div class="span4"><strong>毕业院校:&nbsp;</strong>{{ $user->school }}</div>
            </div>
            <div class="row">
                <div class="span2"><strong>行业:&nbsp;</strong>{{ $user->industry }}</div>
                <div class="span2"><strong>职业:&nbsp;</strong>{{ $user->profession }}</div>
                <div class="span2"><strong>公司类型:&nbsp;</strong>{{ $user->companytype }}</div>
                <div class="span2"><strong>税前月薪:&nbsp;</strong>{{ $user->salary }}</div>
            </div>
            <div class="row">
                <div class="span10"><strong>个人博客:&nbsp;</strong>{{ $user->blog }}</div>
            </div> 
        </div>
    </div>


</div>
@endsection

