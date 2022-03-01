
$(document).ready(function () {
  $('.increment-btn').click(function (e) { 
      e.preventDefault();
      var value = $(this).closest('.product_data').find('.quantity-input').val();
      var incrementValue = parseInt(value, 10);
      incrementValue = isNaN(incrementValue) ? 0 : incrementValue;
      if(incrementValue < 10){
          incrementValue++;
          $(this).closest('.product_data').find('.quantity-input').val(incrementValue);
      }
  });

  $('.decrement-btn').click(function (e) { 
      e.preventDefault();
      var value = $(this).closest('.product_data').find('.quantity-input').val();
      var decrementValue = parseInt(value, 10);
      decrementValue = isNaN(decrementValue) ? 0 : decrementValue;
      if(decrementValue > 1){
          decrementValue--;
          $(this).closest('.product_data').find('.quantity-input').val(decrementValue);
      }
  });

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('.addToCartBtn').click(function (e) { 
      e.preventDefault();
      var product_id = $(this).closest('.product_data').find('.product_id').val();
      var product_quantity = $(this).closest('.product_data').find('.quantity-input').val();

      $.ajax({
          method: "POST",
          url: "/add-to-cart",
          data: {
              'product_id' : product_id,
              'product_quantity' : product_quantity,
          },
        success: function (response) {
            window.location.href = '/cart';
            alert(response.status);
          }
      });
  });

  $('.delete_cart_item').click(function (e) { 
    e.preventDefault();
    var product_id = $(this).closest('.product_data').find('.product_id').val();

    $.ajax({
      method: 'POST',
      url: "delete-cart-item",
      data: {
        'product_id': product_id,
      },
      success: function (response) {
        window.location.reload();
        alert(response.status);
      }
    });
  });

  $('.changeQuantity').click(function (e) { 
    e.preventDefault();
    var product_id = $(this).closest('.product_data').find('.product_id').val();
    var product_quantity = $(this).closest('.product_data').find('.quantity-input').val();

    $.ajax({
      method: "POST",
      url: "update-cart",
      data: {
        'product_id': product_id,
        'product_quantity': product_quantity,
      },
      success: function (response) {
        window.location.reload();
      }
    });
  });
});