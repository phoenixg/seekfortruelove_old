//valums file uploader
$(document).ready(function(){
	function createUploader(){
		var uploader = new qq.FileUploader({
			element: document.getElementById('image-uploader'),
			action: BASE + '/dashboard/imageupload',
			params: {},
			allowedExtensions: ["jpeg", "jpg", "png", "gif"],
			debug: false,
			demoMode: false,
			multiple: false,
			sizeLimit: 10000000,
			inputName: 'qqfile',
			uploadButtonText: '点此上传照片或拖动照片到此处',
			dragText: '把照片拖进这里',
			cancelButtonText: '取消',
			failUploadText: '失败',
			multipleFileDropNotAllowedMessage: '您只能拖动一个文件',
			onComplete: function(id, originFileName, responseJSON){
				//console.log(responseJSON.uploadFileName);
				if (responseJSON.success == false) {
					$('#modal').modal({
						backdrop:true,
						keyboard:true,
						show:true
					});

					$('#modal h3').text('出错啦！');
					$('#modal .modal-header').append("<div class='modal-body'><p>请确保上传的图片是大小在100KB以内的图片格式</p></div>");
					$('#modal').on('hidden', function(){
						location.reload();
					});

					return false;
				}

				console.log('upload done');
				
				//convert the uploaded image, then save it and add a record into db
				handleAfterUpload(responseJSON.uploadFileName);
				
				$('.qq-upload-success').click(function(){
					$(this).fadeOut();
				});
			}
		});
	}

	createUploader();

	function handleAfterUpload(uploadFileName) {
		//console.log(uploadFileName);
		$.ajax({
			url: BASE + "/dashboard/imagehandle",
			data: {
				"uploadFileName" : uploadFileName
			},
			type:"POST",
			dataType:"json",
			success: function(jsonData){
				//console.log(jsonData);
				
				if (jsonData.success == true) {
					console.log('handleAfterUpload done');

					$('#modal').modal({
						backdrop:true,
						keyboard:true,
						show:true
					});

					$('#modal h3').text('上传成功！');
					$('#modal').on('hidden', function(){
						location.reload();
					});				
				};	
			},
			error:function(re) {
				//console.log(re);
			}
		});
	}

	//tooltip
	$("[rel=tooltip]").tooltip({
		placement : 'bottom',
		title : '注意！只允许jpeg, jpg, png, gif 格式，大小在100KB以内的图片。最多能上传5张'
	});

}); 

//fancybox
$(document).ready(function() {
	$(".fancybox").fancybox({
		'padding' : 0,
		'transitionIn'	:	'elastic',
		'transitionOut'	:	'elastic',
		'speedIn'		:	500,
		'speedOut'		:	500,
		helpers : {
			overlay : {
				css : {
					'background' : 'rgba(20, 20, 20, 0.95)'
				},
			title : null
			}
		},
		beforeShow: function () {
			// Disable right click
			$.fancybox.wrap.bind("contextmenu", function (e) {
				return false;
			});
		}
	});
});

//Delete choosen image
$(document).ready(function(){
	
	$('#delete').click(function(e){
		e.preventDefault();

		var imgtodelete = $('#imgtocrop').val();
		
		$.ajax({
			url: BASE + "/dashboard/imagedelete",
			data: {
				"imgtodelete" : imgtodelete
			},
			type:"DELETE",
			dataType:"json",
			success: function(jsonData){
				if (jsonData.success == true) {
					console.log('Image delete done');
					
					$('#modal').modal({
						backdrop:true,
						keyboard:true,
						show:true
					});

					$('#modal h3').text('照片删除成功！');
					$('#modal').on('hidden', function(){
						location.reload();
					});
				}else{
					location.reload();
				}
			},
			error:function(re) {
				//console.log(re);
			}
		});

	});
});


//Jcrop
$(document).ready(function(){
	// Create variables (in this scope) to hold the API and image size
	var jcrop_api, boundx, boundy;

	$('#target').Jcrop({
		bgOpacity: 0.5,
		bgColor: 'white',
		addClass: 'jcrop-light',
		onSelect: updateCoords,
		aspectRatio: 0.8467
	},function(){
		// Use the API to get the real image size
		var bounds = this.getBounds();
		boundx = bounds[0];
		boundy = bounds[1];
		// Store the API in the jcrop_api variable
		jcrop_api = this;
	});

	function updateCoords(c)
	{
		$('#x').val(c.x);
		$('#y').val(c.y);
		$('#w').val(c.w);
		$('#h').val(c.h);
	};

	function checkCoords()
	{
		if (parseInt($('#w').val())) return true;
		alert('Please select a crop region then press submit.');
		return false;
	};

	//提交crop表单前检查
	$('#cropsubmit').click(function(){
		return checkCoords();
	});


	//更换要crop的图
	var arrJPEG = [];
	$('#image-group a').each(function(index, element) {
		arrJPEG.push($(element).attr('href'));
	});

	var i = 1;
	$('#change').click(function(e){
		e.preventDefault();
		
		if (arrJPEG[i] == undefined) {
			jcrop_api.setImage(arrJPEG[0]);
			$('#imgtocrop').val(arrJPEG[0]);
			i = 1;
		} else {
			jcrop_api.setImage(arrJPEG[i]);
			$('#imgtocrop').val(arrJPEG[i]);
			i ++;
		}
	});

});