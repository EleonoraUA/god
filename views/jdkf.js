$.ajax({
        type: 'POST',
        dataType: 'json',
        url: '/web/4/god/core/ajax.php',
        data: {
        	article: item
        },
        success: function(result){
         	console.log(result['topic']);
        }
    });



 $.getJSON("/web/4/god/core/ajax.php?article="+item,  function(result) {
    	$('.content').html(result.content);
    });

 $(this).attr("href")