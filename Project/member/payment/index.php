
<button id="b1" onclick="pay_now()">pay</button>

<script src="https://api.razorpay.com"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
<script>
    
    function pay_now(){
    
        var hno=101
        var ptype="maintenance";
        var amount=100;

        var options = {
            "key": "rzp_test_Cl1G7wgRpRqdBD", // Enter the Key ID generated from the Dashboard
            "amount": amount*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
            "currency": "INR",
            "name": "Karnavati Apartment",
            "description": ptype,
            "image": "img/paymentlogo.jpg",

            "handler": function (response){
                jQuery.ajax({
                    type:'post',
                    url:'payment_process.php',
                    data:"payment_id="+response.razorpay_payment_id+"&hno="+hno+"&ptype="+ptype+"&amount="+amount,
                    success:function(result){
                    window.location.href="thankyou.php";
            }
        });
    }
};
        
     
var rzp1 = new Razorpay(options);
    rzp1.open();
    }
</script>