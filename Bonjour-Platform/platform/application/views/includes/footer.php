<div class="footer navbar navbar-static-bottom row">
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 pull-right">
        <ul class="nav nav-pills navbar-right contact-bar">
            <li><a href="#">Competetion Info</a><p>&nbsp;&nbsp;|</li>
            <li><a href="#">&nbsp;&nbsp;Contact Us</a></li>
        </ul>
    </div>
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-8">
        <ul class="nav nav-pills terms-bar">
            <li><p>Powerd by Hit Seven 2013. All rights reserved.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p></li>
            <li><a href="#">Terms of Use</a><p>&nbsp;&nbsp;|</p></li>
            <li><a href="#">&nbsp;&nbsp;Privacy Policy</a></li>
        </ul>
    </div>
</div>
</div>
</div>

<script>
    function get_cards(cat_id,cat_name){
        $('#card-ajax').html('Please Wait ...');
        $('#card-sta-hide').hide();
        $.post( "ajax/get_card_by_category/", { cat_id: cat_id})
        .done(function( data ) {
            if(data){
                $('#card-ajax').html(data);
                $('#cat_name').html(cat_name + ' / Card');
            }
        });
    }
		
		
    function add_category(cat_id){
        //$('#cat_interest').html('Please Wait ...');
        $.post( "ajax/add_category_to_user/", { cat_id: cat_id})
        .done(function( data ) {
            if(data){
                $('#cat_interest').html(data);
                $('#cat_'+cat_id).hide('slow');
            }
        });
    }
    
     
    $('#message').keydown(function(e) {
        if (e.keyCode == 13) {
            var reciver_id = $('#reciver_id').val();
            var message = $('#message').val();
            //$('#cat_interest').html('Please Wait ...');
            $.post( "ajax/save_mesage/", { message_body: message , to : reciver_id })
            .done(function( data ) {
                if(data){
                    if(data == 1){
                        $('#message').val(null);
                    }else{
                        $('#remes').html('Wrong');
                    }
                }
            });
        }
    });
    
    
    
    function get_function(fun_name){
        $.post(fun_name)
        .done(function( data ) {
            if(data){
                $('#admin').html(data);
            }
        });
    
    }
    
</script>
</body>

</html>