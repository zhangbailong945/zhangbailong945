/**
 * @param $dataUrl  获取最新文章url post地址
 * @param $articleUrl 查看文章url post地址
 * @returns
 */
function getRecentThree($recentUrl,$articleUrl)
{
	$.ajax({
 	    type: 'POST',
 	    async: true,
 	    url:$recentUrl,
 	    dataType: "json",
 	    success: function(data)
 	    {
		    $(".recent-post").html('');
 	    	if(data)
               { 
                   var html = '';
                   for (var i = 0; i <data.length; i++) {
                       html += '<div class="recent-single-post">';
                       html += '<a href="'+$articleUrl+'/'+data[i]["article_id"]+'" class="post-title">'+data[i]["article_title"]+'</a>';
                       html += '<div class="date">'+data[i]["article_created"]+'</div>';
                       html += '</div>';
                   }
                   $(".recent-post").append(html); 
                                           
 	          }
              else
              {	            	
             	  var html='';
                  html += '<div class="recent-single-post">';
                  html += '<a href="#" class="post-title"></a>';
                  html += '<div class="date"></div>';
                  html += '</div>';
                  $(".recent-post").append(html);
 	          }
 	   }
 	});
}


/**
 * 
 * @param $searchUrl1   //默认搜索地址
 * @param $searchUrl2  //带关键字地址
 * @param $keyword   //关键字
 */
function dosearch($searchUrl1,$searchUrl2,$keyword)
{
    if($keyword.length == 0)
    {   	
    	location.href=$searchUrl1;
    }
    else
    {
    	location.href=$searchUrl2;
    }
}

/*
*
*火箭JS
*/

var x=$(window);
var e=$("#shape");

$("html,body").ready(function(){
	var scrollbar=x.scrollTop();
	var isClick=0;

	(scrollbar<=0)?($("#shape").hide()):($("#shape").show());

	$(window).scroll(function(){
		scrollbar=x.scrollTop();
		(scrollbar<=0)?($("#shape").hide()):($("#shape").show());			
	})

	$("#shape").hover(
		function(){
			$(".shapeColor").show();
		},

		function(){
			$(".shapeColor").hide();
		}
	)

	$(".shapeColor").click(
		function(){
			$(".shapeFly").show();
			$("html,body").animate({scrollTop: 0},"slow");
			$("#shape").delay("200").animate({marginTop:"-1000px"},"slow",function(){
				$("#shape").css("margin-top","-125px");
				$(".shapeFly").hide();
			});
			
	})

})