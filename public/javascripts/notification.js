$('#notification-button').click(function(){
	$('.notification-messages').toggle(100);
});


$.ajax({
	'url' : '/notification',
	'type' : 'GET',
	'success' : function(data){
		$('.notification-messages').html(data);
	}
});

$.ajax({
	'url' : '/notification-count',
	'type' : 'GET',
	'success' : function(data){
		$('.unread-notification-count').html(data);
	}
})