jQuery(document).ready(function($) {
	function admin_ws_filter_ajx(filter, res_id) {
        var filter = $(filter);
        if( filter ) {
            $.ajax({
                url:filter.attr('action'),
                data:filter.serialize(), // form data
                type:filter.attr('method'), // POST
                cache: false,
                beforeSend: function() {
                    $('.loader').show();
                },
                complete: function(){
                    $('.loader').hide();
                },
                success:function(data){
           			$(res_id).html(data);
           			setTimeout(function() {
           				window.location.href = window.location.href.replace( /[\?#].*|$/, "?page=brewers-settings&reload=1" );
           			}, 1000);
                },
                async: "false",
            });
        }
    }

    $('#sync-form1').submit(function(){
		var res_id = '#adminresult1';
		admin_ws_filter_ajx(this, res_id );
		return false;
    });

    $('#reload1').click(function(e) {
		e.preventDefault();
		$('#sync-form1').submit();
	});

});	