// parse search parameters and set default
var qHeight 	   = $('#sliderHeight').val().split(';');
var qHeightSmaller = qHeight[0];
var qHeightTaller  = qHeight[1];
var qAge 		   = $('#sliderAge').val().split(';');
var qAgeYoung 	   = qAge[0];
var qAgeOld	       = qAge[1];
var qSex           = '';
var qNationality   = '';
var qDistrict      = '';
var qSalary        = $('#sliderSalary').val().split(';');
var qSalaryLow     = qSalary[0];
var qSalaryHigh    = qSalary[1];
var qAcademic      = $('#sliderAcademic').val().split(';');
var qAcademicLow   = qAcademic[0];
var qAcademicHigh  = qAcademic[1];

// search
$(document).ready(function() {
	$("#search").click(function(){
		// parse qSex
		if ($('#sex-male').hasClass('btn-primary')) 
		{
			qSex = '男';
		} else if ($('#sex-female').hasClass('btn-primary')) 
		{
			qSex = '女';
		}

		// parse qNationality
		qNationality = '';
		$('#nationality span.label-success').each(function(){  
			qNationality += ','+$(this).attr('data-oid');
		});
		qNationality = qNationality.slice(1, qNationality.length);

		// parse qDistrict
		qDistrict = '';
		$('#district span.label-success').each(function(){
			qDistrict += ','+$(this).attr('data-oid');
		});
		qDistrict = qDistrict.slice(1, qDistrict.length);

		$.ajax({
			url: BASE + "/search",
			data: {
				'qHeightSmaller' : qHeightSmaller, 
				'qHeightTaller'  : qHeightTaller,
				'qAgeYoung'	     : qAgeYoung,
				'qAgeOld'	     : qAgeOld,
				'qSalaryLow'     : qSalaryLow,
				'qSalaryHigh'    : qSalaryHigh,
				'qAcademicLow'   : qAcademicLow,
				'qAcademicHigh'  : qAcademicHigh,
				'qSex'           : qSex,
				'qNationality'   : qNationality,
				'qDistrict'      : qDistrict
			},
			type:"POST",
			dataType:"json",
			success:function(jsonData){
				// no result found			
				if (jsonData.length < 1) {
					$('#modal').modal({
						backdrop:true,
						keyboard:true,
						show:true
					});

					$('#modal h3').text('当前没有符合搜索条件的结果哦！');

					return false;
				}

				// show result
				var html = '';
				for(var i = 0; i < jsonData.length; i++){
					html += '<li><a href="'+BASE+'/profile/'+jsonData[i].id+'" class="fancybox" rel="external" target="_blank">';
					html += '<span class="imghover_gallery"></span>';
					html += '<img src="'+BASE+'/images/profile/icon/'+jsonData[i].id+'.jpg" />';
					html += '</a></li>';
				}
				
				$('#search_result_title').show();
				$('#thumbnails').html(html);

				//scroll down to the thumbnail pictures
				$('html, body').scrollTo($('.thumbnails'), 800);
			},
			error:function(re) {
				//console.log(re);
			}
		});	
		
	});
	
});	


//slider
$(document).ready(function() {
	//height
	$("#sliderHeight").slider({ 
		from: 140, 
		to: 230,  
		step: 1, 
		round: 0,
		format: { format: '##', locale: 'cn' },
		heterogeneity: ['10/150', '70/180', '90/200'],
		scale: [140, '|', 150, '|', 155, '|', 160, '|', 165, '|', 170, '|', 175, '|', 180, '|', 190, '|', 200, '|', 230],
		limits: true,
		dimension: '&nbsp;cm',
		skin: 'round_plastic',
		callback: function(value){
			qHeight = value.split(';');
			qHeightSmaller = qHeight[0];
			qHeightTaller  = qHeight[1];
		}
	});


	//age
	$("#sliderAge").slider({ 
		from: 18, 
		to: 38,  
		step: 1, 
		round: 0,
		format: { format: '##', locale: 'cn' },
		scale: [18, '|', 20, '|', 22, '|', 24, '|', 26, '|', 28, '|', 30, '|', 32, '|', 34, '|', 36, '|', 38],
		limits: true,
		skin: 'round_plastic',
		callback: function(value){
			//console.log(value);
			qAge = value.split(';');
			qAgeYoung = qAge[0];
			qAgeOld = qAge[1];
		}
	});



	//salary
	$("#sliderSalary").slider({ 
		from: 0, 
		to: 30000,  
		step: 500, 
		round: 0,
		format: { format: '##', locale: 'cn' },
		//从scale的第2个开始计数 n/20
		heterogeneity: ['10/3000', '60/8000', '80/12000', '90/15000'],
		scale: [0, '|', 3000, '|', 4000, '|', 5000, '|', 6000, '|', 7000, '|', 8000, '|', 10000, '|', 12000, '|', 15000, '|', 30000],
		limits: true,
		dimension: '&nbsp;&yen;',
		skin: 'round_plastic',
		callback: function(value){
			qSalary = value.split(';');
			qSalaryLow = qSalary[0];
			qSalaryHigh = qSalary[1];
		}
	});

	//academic
	$("#sliderAcademic").slider({ 
		from: 1,
		to: 9,
		step: 1,
		round: 0,
		format: { format: '##', locale: 'cn' },
		limits: true,
		skin: 'round_plastic',
		scale: ['|', '|', '|', '|', '|', '|', '|', '|', '|'],
		limits: false,
		calculate: function(value){
			switch(value){
				case 1:
					return '小学';
					break;
				case 2:
					return '初中';
					break;
				case 3:
					return '中专';
					break;
				case 4:
					return '高中';
					break;
				case 5:
					return '大专';
					break;
				case 6:
					return '本科';
					break;
				case 7:
					return '研究生';
					break;
				case 8:
					return '博士';
					break;
				case 9:
					return '博士后';
					break;
			}
		},
		callback: function(value){
			qAcademic = value.split(';');
			qAcademicLow = qAcademic[0];
			qAcademicHigh = qAcademic[1];
		}
	});
});


// back to top
$(function() {
	$(window).scroll(function() {
		if($(this).scrollTop() != 0) {
			$('#toTop').fadeIn();	
		} else {
			$('#toTop').fadeOut();
		}
	});
 
	$('#toTop').click(function() {
		$('body,html').animate({scrollTop:0},800);
	});	
});


// toggle sex
$(document).ready(function() {
	$('#sex-male').click(function(){
		$(this).addClass('btn-primary');
		$('#sex-female').removeClass('btn-primary');
	});

	$('#sex-female').click(function(){
		$(this).addClass('btn-primary');
		$('#sex-male').removeClass('btn-primary');
	});

});

// toggle nationality and district
$(document).ready(function() {
	$('#nationality span').click(function(){
		$(this).toggleClass('label-success');
	});

	$('#district span').click(function(){
		$(this).toggleClass('label-success');
	});
});

