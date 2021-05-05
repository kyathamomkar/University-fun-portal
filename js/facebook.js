$(document).on('click','.facebookbuttons',function(e) {
	var data = $("#facebookform").serialize();
	$function = $(this).attr('id');
	data = data+"&increment=true&function="+$function;
	
	if(!($(this).hasClass('liked')))
	{
	
	$.ajax({
        data: data,
        type: "post",
        url: "/facebook.php",
        success: function(dataResult){
            var dataResult = JSON.parse(dataResult);
            if(dataResult.statusCode==200){
				
				if($function=='like' && !($('#like').hasClass("disabled")))
				{
					$('#liketext').html("Liked");
					$('#disliketext').html("DisLike");
					$('#likecount').html(parseInt($('#likecount').html(), 10)+1);
					if($('#dislike').hasClass("disabled"))
					{
						$('#dislike').removeClass("disabled");	
						$('#dislikecount').html(parseInt($('#dislikecount').html(), 10)-1);
						revert(data+"&increment=false&function=dislike");
					}
							
					$('#liketext, #likeicon,#likecount,#like').addClass("liked");
					$('#disliketext, #dislikeicon,#dislikecount,#dislike').removeClass("liked");
					$('#like').addClass("disabled");
								 
				}
				else if($function=='dislike' && !($('#dislike').hasClass("disabled"))){
					$('#disliketext').html("DisLiked");
						$('#liketext').html("Like");
					$('#dislikecount').html(parseInt($('#dislikecount').html(), 10)+1);
					$('#disliketext, #dislikeicon,#dislikecount,#dislike').addClass("liked");
					$('#liketext, #likeicon,#likecount,#like').removeClass("liked");
				    $('#dislike').addClass("disabled");
					
					if($('#like').hasClass("disabled"))
					{
						$('#like').removeClass("disabled");	
						$('#likecount').html(parseInt($('#likecount').html(), 10)-1);
						revert(data+"&increment=false&function=like");
					}
				 }
			 }
            else if(dataResult.statusCode==201){
                alert("Something went wrong. Try again");
            }
        }
}); }
}); 

function revert($data)
{
	$.ajax({
        data: $data,
        type: "post",
        url: "/facebook.php",
        success: function(dataResult){
			
		}
	});
}