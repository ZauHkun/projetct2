
$('.custom_checkbox').on('change', function(){ // on change of state
    if(this.checked) // if changed state is "CHECKED"
     {
         $('.old_customer').css('display','none');
         $('.old_customer').prop('disabled',true);

         $('.new_customer').css('display','block');
         $('.new_customer').prop('disabled',false);
         $('.address').css('display','block');
         $('.address').prop('disabled',false);
     }else{
        $('.old_customer').css('display','block');  
        $('.old_customer').prop('disabled',false);   
           
        $('.new_customer').css('display','none');
        $('.new_customer').prop('disabled',true);
        $('.address').css('display','none');
        $('.address').prop('disabled',true);
     }
 });

function removeMe(current_tag) {
    var row = $("tbody tr").length;
    if (row == 1) {
        alert('it can not be deleted');
    } else {
        $(current_tag).parent().parent().remove(); 
        totalAmount();
        sessionStorage.setItem('er_status',0);
        enableBtnSave();        
    }
}

// multiply price and qty and then put the result to amount text fields
$(document).ready(function(){
    $("tbody").on("keyup",".qty,.discount", function() {             
        var tr = $(this).parent().parent();
               
        var qty = tr.find('.qty').val();
        var price = tr.find('.price').val();
        var balance = tr.find('.balance').val();
        var discount = tr.find('.discount').val();
        var error = tr.find('.error');
        
        sessionStorage.setItem('er_status',0); 
        if (qty.length != 0 && parseInt(qty)!=0) 
        {    
            if( parseInt(balance) == parseInt(qty) ||  parseInt(balance) > parseInt(qty)) 
            {               
                if (discount.length != 0) 
                {
                    if (withPercent(discount)) {
                        //removed % character from discount
                        var disc_percent = discount.substring(0, discount.length - 1);
                        var temp_amount = parseInt(price * qty);
                        amount = temp_amount - ((disc_percent * parseInt(temp_amount)) / 100);
                        tr.find('.amount').val(amount);
                        totalAmount();       
                        sessionStorage.setItem('er_status',0);           
                        enableBtnSave();
                        
                    } else if (onlyDigits(discount)) {
                        amount = parseInt(price * qty) - parseInt(discount);
                        tr.find('.amount').val(amount);
                        totalAmount();
                        sessionStorage.setItem('er_status',0);           
                        enableBtnSave();                       
                    }else{                       
                        sessionStorage.setItem('er_status',1);           
                        enableBtnSave();
                       
                    }
                } else {
                    tr.find('.amount').val(price * qty);
                    totalAmount();
                }
            }else {                
                sessionStorage.setItem('er_status',1);           
                enableBtnSave()
               
            }
            
        } else {                   
            sessionStorage.setItem('er_status',1);           
            enableBtnSave();            
        }
        function enableBtnSave(){
            var error_status=sessionStorage.getItem('er_status');
            if(error_status!=0){
                $('.btn-save').prop('disabled', true);
                $('.btn-save').css('cursor', 'not-allowed');
                $('.addrow').prop('disabled', true);
                $('.addrow').css('cursor', 'not-allowed');                
                tr.find('.qty').css('border','solid 2px red');
            }else{
                $('.btn-save').prop('disabled', false);
                $('.btn-save').css('cursor', 'pointer');
                $('.addrow').prop('disabled', false);
                $('.addrow').css('cursor', 'pointer');
                tr.find('.qty').css('border','');
            }    
        }
        
    });
    
});
// check error


// sum all amount for each row
function totalAmount() {
    
    var total = 0;
    $(".amount").each(function(i, e) {
        total += parseInt($(this).val());
        //total += $(this).val();
    });
    $(".total").html(total + ".00 Ks");
}

function onlyDigits(str) {
    if (str.length > 0) {
        for (let i = str.length; i >= 0; i--) {
            const d = str.charCodeAt(i);
            if (d < 48 || d > 57) return false;
        }
        return true;
    }
}

function withPercent(str) {
    if (str.length > 1) {
        const last_char = str.charCodeAt(str.length - 1);
        for (let i = str.length - 2; i >= 0; i--) {
            const d = str.charCodeAt(i);
            if (d < 48 || d > 57)
                return false
        }
        if (last_char != '37') {
            return false
        } else {
            return true
        }
    }
    return false
}