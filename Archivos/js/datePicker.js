//Dynamic Datepicker Fields
$('body').on('focus',".datepicker", function(){
    $(this).datepicker({
		dateFormat: 'yy-mm-dd'
	});
});

$(document).ready(function() {
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="input-line-control removeMe"><div class="col-md-8"><div class="form-group"><input type="text" class="form-control datepicker" placeholder="Pick the date"></div></div><div class="col-md-4"><button class="btn btn-danger remove-date"><i class="fa fa-remove"></i>Remove</button></div></div>'); //add input box
        }
    });
    
    $(wrapper).on("click",".remove-date", function(e){ //user click on remove text
        e.preventDefault(); $(this).closest('div.removeMe').remove(); x--;
    })
});