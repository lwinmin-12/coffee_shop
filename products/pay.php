<?php require_once "../template/header.php"; ?>



<section class="home-slider owl-carousel">
<div class="slider-item" style="background-image: url(<?= url('images/bg_3.jpg') ?>);" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
  <div class="container">
    <div class="row slider-text justify-content-center align-items-center">

      <div class="col-md-7 col-sm-12 text-center ftco-animate">
          <h1 class="mb-3 mt-5 bread">Pay with PayPal</h1>
          <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checout</span></p>
      </div>

    </div>
  </div>
</div>

</section>

   
    <div class="container w-50 mt-4">  
                    <!-- Replace "test" with your own sandbox Business account app client ID -->
                    <!-- <script src="https://www.paypal.com/sdk/js?client-id=AQeWjvRZmhYcfRNgEzqmSJGvZjazI7t8x9j9T6Lw0cSuDtCx1JYPwNu2YSfTvPKYILj0G9S8qcVJdnV2&currency=USD"></script> -->
                    <script src="https://www.paypal.com/sdk/js?client-id=AQeWjvRZmhYcfRNgEzqmSJGvZjazI7t8x9j9T6Lw0cSuDtCx1JYPwNu2YSfTvPKYILj0G9S8qcVJdnV2&currency=USD"></script>

                    <!-- Set up a container element for the button -->
                    <div id="paypal-button-container"></div>
                    <script>
                        paypal.Buttons({
                        // Sets up the transaction when a payment button is clicked
                        createOrder: (data, actions) => {
                            return actions.order.create({
                            purchase_units: [{
                                amount: {
                                value: '<?= $_SESSION['total_price']; ?>' // Can also reference a variable or function
                                }
                            }]
                            });
                        },
                        // Finalize the transaction after payer approval
                        onApprove: (data, actions) => {
                            return actions.order.capture().then(function(orderData) {
                          
                             window.location.href='deleteCart.php';
                            });
                        }
                        }).render('#paypal-button-container');
                    </script>
                  
                </div>
            </div>
        </div>


    
     
<?php require_once "../template/footer.php"; ?>
