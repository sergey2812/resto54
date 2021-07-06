$(document).ready(function(){

// функция отображения модального окна корзины
	function showCart(cart)	{

			$('#cart .modal-body').html(cart);
			$('#cart .modal-header').html('');
			$('#cart .modal-header').html('<h5 style="color: #555; font-size: 18px; font-weight: 600; padding-left: 35%;">Корзина и Ваш выбор</h5><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>');

			$('#cart').modal();

			return false;
	}	

// Показ / Скрытие 3-полей в checkout: УЛИЦА, ДОМ, КВАРТИРА после перезагрузки страницы
   
	$('input[name="Orders[variant]"]').each(function (i, element){

		if($(this).prop("checked") && $(this).val() == 3)
			{
				$(".checkout-adress-field").each(function (i, element){
				    
				    $(this).css('display', 'flex');
				 
				});			
			}
		else
			{
				$(".checkout-adress-field").each(function (i, element){
				    
				    $(this).css('display', 'none');
				 
				});										
			}
	});   

// Если поле улицы показано в форме, то надо смотреть чтобы оно не было пустым
	$('input[name="Orders[street]"]').on('blur', function(){

		if ($(this).val() == '')
			{ 
				
				if($("lable").is("#lable-for-street"))
					{
						$('#lable-for-street').css('display', 'flex');
						$('#orders-street').removeClass('success-border');
					}
				else
					{
						$('.form-group.field-orders-street').append('<lable id="lable-for-street" style="color: red;">Впишите название улицы!</lable>');
						$('#orders-street').removeClass('success-border');
					}
			}
		else
			{
				
				$('#lable-for-street').css('display', 'none');
				$('#orders-street').addClass('success-border');
					
			}
	});

// Если поле дома показано в форме, то надо смотреть чтобы оно не было пустым             
	$('input[name="Orders[house]"]').on('blur', function(){

		if ($(this).val() == '' || isNaN($(this).val()))
			{ 
				
				if($("lable").is("#lable-for-house"))
					{
						$('#lable-for-house').css('display', 'flex');
						$('#orders-house').removeClass('success-border');
					}
				else
					{
						$('.form-group.field-orders-house').append('<lable id="lable-for-house" style="color: red;">Впишите № дома!</lable>');
						$('#orders-house').removeClass('success-border');
					}
			}
		else
			{
				$('#lable-for-house').css('display', 'none');
				$('#orders-house').addClass('success-border');
			}
	});

// Если поле квартиры показано в форме, то надо смотреть чтобы оно не было пустым
	$('input[name="Orders[kv]"]').on('blur', function(){

		if ($(this).val() == '' || isNaN($(this).val()))
			{ 
				
				if($("lable").is("#lable-for-kv"))
					{
						$('#lable-for-kv').css('display', 'flex');
						$('#orders-kv').removeClass('success-border');
					}
				else
					{
						$('.form-group.field-orders-kv').append('<lable id="lable-for-kv" style="color: red;">Впишите № квартиры!</lable>');
						$('#orders-kv').removeClass('success-border');
					}
			}
		else
			{
				$('#lable-for-kv').css('display', 'none');
				$('#orders-kv').addClass('success-border');
			}			
	});

// Показ / Скрытие 3-полей в checkout: УЛИЦА, ДОМ, КВАРТИРА в зависимости от выбора питания
// и
// Изменение цвета label'а в зависимости от выбора варианта питания - это вариант № 3
   $('.custom-control-input').on('change', function(){
        
	 if($(this).val() == 3)
	 	{
			var labelfor = 2;

			$(".checkout-adress-field").each(function (i, element){
			    
			    $(this).css('display', 'flex');
			 
			});

			$('.custom-control-label').each(function (i, element){	

				var label_this = $(this);
				var label_attr_for = $(this).attr('for');
				num_current = Number.parseInt(label_attr_for.charAt(1)); // номер текущего label'a 				

				if(num_current == labelfor)
	 				{
	 					label_this.css('color', 'green');
	 				}
	 			else
	 				{
			 			if(num_current < labelfor)
			 				{
			 					label_this.css('color', 'white');
			 				}
	 				}
			});
	 	}
	 else
	 	{
			$(".checkout-adress-field").each(function (i, element){
			    
			    $(this).css('display', 'none');
			 
			});
			
	 	}
        
    });

// Изменение цвета label'а в зависимости от выбора варианта питания - это вариант № 2
   $('.custom-control-input').on('change', function(){
        
	 if($(this).val() == 2)
	 	{
			var labelfor = 1;

			$('.custom-control-label').each(function (i, element){	

				var label_this = $(this);
				var label_attr_for = $(this).attr('for');
				num_current = Number.parseInt(label_attr_for.charAt(1)); // номер текущего label'a 				

				if(num_current == labelfor)
	 				{
	 					label_this.css('color', 'green');
	 				}
	 			else
	 				{
			 			if(num_current < labelfor )
			 				{
			 					label_this.css('color', 'white');
			 				}
			 			else
				 			{
				 				if(num_current == 2)
					 				{
					 					label_this.css('color', 'white');
					 				}
				 			}
	 				}
			});
	 	}
        
    });   

// Изменение цвета label'а в зависимости от выбора варианта питания - это вариант № 1
   $('.custom-control-input').on('change', function(){
        
	 if($(this).val() == 1)
	 	{
			var labelfor = 0;

			$('.custom-control-label').each(function (i, element){	

				var label_this = $(this);
				var label_attr_for = $(this).attr('for');
				num_current = Number.parseInt(label_attr_for.charAt(1)); // номер текущего label'a 				

				if(num_current == labelfor)
	 				{
	 					label_this.css('color', 'green');
	 				}
	 			else
	 				{
			 			if(num_current == 1 )
			 				{
			 					label_this.css('color', 'white');
			 				}
			 			else
				 			{
				 				if(num_current == 2)
					 				{
					 					label_this.css('color', 'white');
					 				}
				 			}
	 				}
			});
	 	}
        
    });

// Изменение цвета label'а в зависимости от выбора способа оплаты - это вариант № 1
   $('.custom-control-input').on('change', function(){
        
	 if($(this).val() == 11)
	 	{
			var labelfor = 3;

			$('.custom-control-label').each(function (i, element){	

				var label_this = $(this);
				var label_attr_for = $(this).attr('for');
				num_current = Number.parseInt(label_attr_for.charAt(1)); // номер текущего label'a 				

				if(num_current == labelfor)
	 				{
	 					label_this.css('color', 'green');
	 				}
	 			else
	 				{
			 			if(num_current == 4)
			 				{
			 					label_this.css('color', 'white');
			 				}
	 				}
			});
	 	}
        
    });

// Изменение цвета label'а в зависимости от выбора способа оплаты - это вариант № 2
   $('.custom-control-input').on('change', function(){
        
	 if($(this).val() == 12)
	 	{
			var labelfor = 4;

			$('.custom-control-label').each(function (i, element){	

				var label_this = $(this);
				var label_attr_for = $(this).attr('for');
				num_current = Number.parseInt(label_attr_for.charAt(1)); // номер текущего label'a 				

				if(num_current == labelfor)
	 				{
	 					label_this.css('color', 'green');
	 				}
	 			else
	 				{
			 			if(num_current == 3)
			 				{
			 					label_this.css('color', 'white');
			 				}
	 				}
			});
	 	}
        
    }); 

// функция проверки поля с временем готовности заказа в checkout
	function validateOrdersForTime()	{

   	var today = new Date();
	var yesterday = new Date($('input[name="Orders[for_time]"]').val());
	var event_min = '';
	var event_max = '';
	var one_event_date = '';
	var event = '';
	var min = '';
	var max = '';
	var name = '';
	var url = '';
	var only_food = $('input[name="Orders[for_time]"]').data('only-food');

		if (today > yesterday || yesterday == '' || $('input[name="Orders[for_time]"]').val() == '')
			{ 
				$('input[name="Orders[for_time]"]').val('');

				if($("lable").is("#lable-for-time"))
					{
						$('#lable-for-time').css('display', 'flex');
						$('#orders-for_time').removeClass('success-border');
					}  
				else
					{
						$('#orders-for_time-datetime').append('<lable id="lable-for-time" style="color: red;">К какому времени должен быть готов заказ?</lable>');
						$('#orders-for_time').removeClass('success-border');
					}
			}
		else
			{
				$('#lable-for-time').css('display', 'none');
				$('#orders-for_time').addClass('success-border');

				// получаем время готовности заказа 
				var time_zakaz_2 = $('input[name="Orders[for_time]"]').val();
			    time_zakaz = time_zakaz_2.replace("-", "/").replace("-", "/");
				time_zakaz = Date.parse(time_zakaz); // получаем unicode времени заказа	
				var yes = '';

				// массив, состоящий из строк со всеми мероприятиями
				var events = $('input[name="Orders[for_time]"]').data('all-events');

				// переберём массив с объектами events
				$.each(events, function(index,value){

				  // index - это текущий индекс элемента массива (число)
				  // value - это значение текущего элемента массива
				  	// теперь переберём каждый объект value и выберем значение date_event
					$.each(value, function(ind,val){
					  
					  	one_event_date = value['date_event']; // время очередного мер-я

						event_date = one_event_date.replace("-", "/").replace("-", "/");
						event_date = Date.parse(event_date); // получаем unicode времени мероприятия
						event_max = parseInt(event_date)+parseInt(10800000); // это + 3 часа от начала мероприятия
						event_min = parseInt(event_date)-parseInt(3600000); // это за 1 час до начала мероприятия

						if(time_zakaz > event_min && time_zakaz < event_max)
							{
								yes = 'yes';	
								event = value['date_event'];
								min = event_min;
								max = event_max;
								name = value['name'];
								url = '/afisha/event?id='+value['id']+'&id_category='+value['id_category'];
							}					  

					});				  

				});
				if (yes == 'yes' && $('input[name="Orders[variant]"]:checked').val() == 1 && only_food == undefined)
					{
						// Это предложение купить билет или изменить время
						event_min = new Date(min);
						event_max = new Date(max);
						event = new Date(event);
						
						var monthes = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'];
						var day = event.getDate();
						var month = monthes[event.getMonth()];
						var year = event.getFullYear();
						var hours = event.getHours();
						var minutes = (event.getMinutes() < 10) ? '0' + event.getMinutes() : event.getMinutes();

						var day_min = event_min.getDate();
						var month_min = monthes[event_min.getMonth()];
						var year_min = event_min.getFullYear();
						var hours_min = event_min.getHours();
						var minutes_min = (event_min.getMinutes() < 10) ? '0' + event_min.getMinutes() : event_min.getMinutes();

						var day_max = event_max.getDate();
						var month_max = monthes[event_max.getMonth()];
						var year_max = event_max.getFullYear();
						var hours_max = event_max.getHours();
						var minutes_max = (event_max.getMinutes() < 10) ? '0' + event_max.getMinutes() : event_max.getMinutes();						

						$("#proposal-pay-ticket").html(
							'Уважаемый Гость!</br>'
							+ day + '-' + month + '-' + year + ' в ' + hours + ':' + minutes +' часов будет мероприятие:</br>'
							+ name 
							+'</br>Выбранное Вами время питания попадает на это мероприятие.</br>Чтобы продолжить оформление данного заказа необходимо выполнить одно из 2-х действий:</br>1. если НЕ хотите побывать на этом мероприятии, то просто измените дату:</br>любое время до '
							+hours_min+':'+minutes_min
							+' часов или после '+hours_max+':'+minutes_max
							+' часов.</br>2. если хотите оставить выбранное время, тогда купите билет <a href="'
							+url+'" style="display: contents;"> по этой ссылке</a> и продолжите оформление заказа.'
							);
						$("#proposal-pay-ticket").css('display', 'flex');

						return false;
					}
				else
					{
						$("#proposal-pay-ticket").css('display', 'none');

						return true;
					}								
			}		
	}      

// Проверка даты при заполнении формы, чтобы не было вчерашней даты и проверка: есть ли на данное время мероприятие?
   $('input[name="Orders[for_time]"]').on('change', function(){

		validateOrdersForTime();   	
		        
    }); 

// Проверка даты при отправке формы, чтобы не было вчерашней даты и проверка: есть ли на данное время мероприятие?
   $('#checout-form').on('submit', function(event){

		if(validateOrdersForTime() == false)
			{	
				event.preventDefault();
				$("#proposal-pay-ticket").removeClass('alert-success');
				$("#proposal-pay-ticket").addClass('alert-danger');
			}
		else
			{
				$(this).submit();
			}   	
		        
    });

// Проверка даты, чтобы не было пустой даты и при правильном заполнении имени ставим зеленую рамку
	$('input[name="Orders[name]"]').on('blur', function(){
		
		if ($('input[name="Orders[for_time]"]').val() == '')
			{ 
				if($("lable").is("#lable-for-time"))
					{
						$('#lable-for-time').css('display', 'flex');
					}
				else
					{
						$('#orders-for_time-datetime').append('<lable id="lable-for-time" style="color: red;">К какому времени должен быть готов заказ?</lable>');

					}
			}
		else
			{
				$('#lable-for-time').css('display', 'none');
			}

		if ($(this).val() == '')
			{ 
			
				$(this).removeClass('success-border');
					
			}
		else
			{
				$(this).addClass('success-border');
			}

	});   

// Проверка даты, чтобы не было пустой даты
	$('input[name="Orders[phone]"]').on('blur', function(){
		
		if ($('input[name="Orders[for_time]"]').val() == '')
			{ 
				if($("lable").is("#lable-for-time"))
					{
						$('#lable-for-time').css('display', 'flex');
					}
				else
					{
						$('#orders-for_time-datetime').append('<lable id="lable-for-time" style="color: red;">К какому времени должен быть готов заказ?</lable>');

					}
			}
		else
			{
				$('#lable-for-time').css('display', 'none');
			}

		if ($(this).val() == '')
			{ 
			
				$(this).removeClass('success-border');
					
			}
		else
			{
				$(this).addClass('success-border');
			}			
	});

// Проверка даты, чтобы не было пустой даты
	$('input[name="Orders[email]"]').on('blur', function(){

		var text = $(this).val();

		if (text != '')
			{ 
				if (text.includes('@') && text.includes('.')) 
					{
					  	$('#orders-email').addClass('success-border');
					}
				else
					{
						$('#orders-email').removeClass('success-border');
					}
			}
		else
			{
				$('#orders-email').removeClass('success-border');
			}
	});

// показ модального окна корзины по нажатию на значок корзины
    $('.get-cart').on('click', function(){
        
	    $.ajax({
	        type: "GET",
	        url: "/cart/showcart",
	        
	        success: function (response) {
	       
	        if(!response) alert('ошибка');
	        showCart(response);
	        return false;
	    	},

			error: function() {
				alert('err');
			}
		});

	    return false;
        
    });

// очистка от товаров корзины полностью
   $('.clear-cart').on('click', function(){
        //var type = $(this).data('type');
	    $.ajax({
	        type: "GET",
	        url: "/cart/clearcart",
	        
	        success: function (response) {
	       
	        if(!response) alert('ошибка');

	        // обновление значка корзины
	        $("#small-icon-cart").text(0); // обновление значка корзины  
			
	        showCart(response);

			if(location.toString().indexOf('afisha/event') !== -1) 
				{
					setTimeout(function () 
						{
							location.reload();
						}, 2000); // время в мс
				}

			return false;
	    	},
	    	
			error: function() {
				alert('err');
			}
		});

		return false;
        
    });

// удаление строки конкретного товара из корзины в модальном окне
    $('#cart .modal-body').on('click', '.del-item', function() {
        
        var id = $(this).data('id');
        var qty = $(this).data('qty');
        var type = $(this).data('type');

	    $.ajax({
	        type: "GET",
	        url: "/cart/delitem",
	        data: {id: id, type: type},
	        success: function (response) {
	       
	        if(!response) alert('ошибка');

	        // обновление значка корзины
	        var sum_qty = parseInt($('#small-icon-cart').text());

	        sum_qty = parseInt(sum_qty) - parseInt(qty);

	        $("#small-icon-cart").text(sum_qty); // обновление значка корзины  

	        if (type == 'mesto')
	        	{
					$('#ticket_'+id).html('<a href="/cart/add?id='+id+'" class="btn btn-primary btn-outline-primary add-to-cart" data-id="'+id+'" data-type="mesto">Выбрать</a>');
	        	}
	        showCart(response);	        

	        return false;

	    	},

			error: function() {
				alert('err');
			}
		});

		return false;
        
    });

// удаление строки конкретного товара из корзины на странице checkout
    $('.del-item').on('click', function() {
        
        var id = $(this).data('id');
        var type = $(this).data('type');

	    $.ajax({
	        type: "GET",
	        url: "/cart/delitem",
	        data: {id: id, type: type},
	        success: function (response) {
	       
	        if(!response) alert('ошибка');
	        
	        $('#table-string_'+id).html('');

		        var sum_price = 0;
				var sum_qty = 0;

				$("input[name='quantity").each(function (i, element){
				    
				    var price = $(this).data('price');
				    var qty = $(this).val();

				    sum_qty = parseInt(sum_qty) + parseInt(qty);

				    sum_price += parseInt(qty) * parseInt(price);;
				 
				});

				$("#small-icon-cart").text(sum_qty); // обновление значка корзины

				if (sum_qty == 0)
					{
						$("#row-cart-checkout").html('');
						$(".ftco-section.empty-checkout").html('');
						$("#row-cart-checkout").html('<div id="cart-checkout-empty" style="width: 100%;"><h5 style="color: #555; font-size: 14px; text-align: center;">Корзина пуста.</br></br>Выбирайте блюда в меню!</h5></div>');
					}
				else
					{
						$("#cart-total-qty").text(sum_qty + ' шт.');

						$("#cart-total-cost-1").text(sum_price + ' p.');
						$("#cart-total-cost-2").text(sum_price + ' p.');
					}						        
				return false;
	    	},

			error: function() {
				alert('err');
			}
		});

		return false;
        
    });       

// добавление товара в корзину
   $('.add-to-cart').on('click', function(e){
        
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var id = $(this).data('id');
        var quantity = parseInt($('#quantity_'+id).val());
        var type = $(this).data('type');

        var sum_qty = parseInt($('#small-icon-cart').text());

        sum_qty = parseInt(quantity) + parseInt(sum_qty);

        $("#small-icon-cart").text(sum_qty); // обновление значка корзины

	    $.ajax({
	        type: "GET",
	        url: "/cart/add",
	        data: {id: id, quantity: quantity, type: type},
	        success: function (response) {
	       
	        if(!response) alert('ошибка');

	        if (type == 'mesto')
	        	{
					$('#ticket_'+id).html('<a style="pointer-events: none; opacity: 0.8; background-color: #ddd;" href="#" class="btn btn-primary btn-outline-primary" data-id="'+id+'" data-type="mesto">Куплено</a>');
	        	}
	        showCart(response);
	        return false;
	    	},

			error: function() {
				alert('err');
			}
		});

		return false;
        
    });


// обработка формы добавления количества товара в карточке продукта

   	$('.quantity-right-plus.btn.product').click(function(e){
        
        // Stop acting like a button
        e.preventDefault();

        var id = $(this).data('id');
        var price = $(this).data('price');

        // Get the field name
        var quantity = parseInt($('#quantity_'+id).val());
            
        $('#quantity_'+id).val(quantity + 1); // добавляем в поле input 1

        quantity = parseInt($('#quantity_'+id).val()); // загрузили значение для отправки в php

        if (quantity >= 1000) // защита от набора более 999
    		{
    			$('#quantity_'+id).val(999);
    			alert('Не более 999 шт.');
    			quantity = parseInt($('#quantity_'+id).val());
    		}

			return false;
    });

    $('.quantity-left-minus.btn.product').click(function(e){
        // Stop acting like a button
        e.preventDefault();

        var id = $(this).data('id');
        var price = $(this).data('price');

        // Get the field name
        var quantity = parseInt($('#quantity_'+id).val());
        var quantity_minus = quantity-1;

        if (quantity_minus < 1) // защита от набора меньше 1
    		{
    			$('#quantity_'+id).val(1);
    			alert('Не менее 1 шт.');
    		}
		else
			{
		        $('#quantity_'+id).val(quantity - 1);	        
			}

			return false;
    });

// обработка формы добавления количества товара в модальной КОРЗИНЕ

   	$('#cart .modal-body').on('click', '.quantity-right-plus.btn.modal-cart', function(e) {
        
        // Stop acting like a button
        e.preventDefault();

        var id = $(this).data('id');
        var price = $(this).data('price');

        // Get the field name
        var quantity = parseInt($('#quantity_'+id).val());
            
        $('#quantity_'+id).val(parseInt(quantity + 1));

        quantity = parseInt($('#quantity_'+id).val());    

        if (quantity >= 1000)
    		{
    			$('#quantity_'+id).val(999);
    			alert('Не более 999 шт.');
    		}
		else
			{    		
				// изменение стоимости товара при изменении количества товара в корзине

		        // обновление значка корзины
		        var sum_qty = parseInt($('#small-icon-cart').text());

		        sum_qty = parseInt(sum_qty + 1);

		        $("#small-icon-cart").text(sum_qty); // обновление значка корзины    

			    $.ajax({
			        type: "GET",
			        url: "/cart/plusminus",
			        data: {id: id, quantity: quantity, price: price},
			        success: function (response) {
			       
			        if(!response) alert('ошибка');

			        	showCart(response);
			    	},

					error: function() {
						alert('err');
					}
				});
			}

			return false;
    });

    $('#cart .modal-body').on('click', '.quantity-left-minus.btn.modal-cart', function(e) {
        // Stop acting like a button
        e.preventDefault();

        var id = $(this).data('id');
        var price = $(this).data('price');

        // Get the field name
        var quantity = parseInt($('#quantity_'+id).val());
            
        $('#quantity_'+id).val(parseInt(quantity - 1));

        quantity = parseInt($('#quantity_'+id).val());       

        if (quantity < 1)
    		{
    			$('#quantity_'+id).val(1);
    			alert('Не менее 1 шт.');
    		}
		else
			{	        
				// изменение стоимости товара при изменении количества товара в корзине

		        // обновление значка корзины
		        var sum_qty = parseInt($('#small-icon-cart').text());

		        sum_qty = parseInt(sum_qty - 1);

		        $("#small-icon-cart").text(sum_qty); // обновление значка корзины  

			    $.ajax({
			        type: "GET",
			        url: "/cart/plusminus",
			        data: {id: id, quantity: quantity, price: price},
			        success: function (response) {
			       
			        if(!response) alert('ошибка');

			        	showCart(response);
			    	},

					error: function() {
						alert('err');
					}
				});
			}

			return false;
    });

// обработка формы добавления количества товара на странице checkout

   	$('.quantity-right-plus.btn.checkout').click(function(e){
        
        // Stop acting like a button
        e.preventDefault();

        var id = $(this).data('id');
        var price = $(this).data('price');

        // Get the field name
        var quantity = parseInt($('#quantity_'+id).val());
            
        $('#quantity_'+id).val(quantity + 1);

        quantity = parseInt($('#quantity_'+id).val());

        if (quantity >= 1000)
    		{
    			$('#quantity_'+id).val(999);
    			alert('Не более 999 шт.');
    			quantity = parseInt($('#quantity_'+id).val());
    			$('#total_'+id).text(parseInt(quantity * price) + ' p.');
    		}
		else
			{    		

		        $('#total_'+id).text(quantity * price + ' p.');

		        var sum_price = 0;
				var sum_qty = 0;

				$("input[name='quantity").each(function (i, element){
				    
				    var price = $(this).data('price');
				    var qty = $(this).val();

				    sum_qty = parseInt(sum_qty) + parseInt(qty);

				    sum_price += parseInt(qty) * parseInt(price);;
				 
				});		        

				$("#cart-total-qty").text(sum_qty + ' шт.');
				$("#small-icon-cart").text(sum_qty); // обновление значка корзины

				$("#cart-total-cost-1").text(sum_price + ' p.');
				$("#cart-total-cost-2").text(sum_price + ' p.');

				// изменение стоимости товара при изменении количества товара в корзине

			    $.ajax({
			        type: "GET",
			        url: "/cart/checkout",
			        data: {id: id, quantity: quantity, price: price},
			        success: function (response) {
			       
			        if(!response) alert('ошибка');


			    	},

					error: function() {
						alert('err');
					}
				});
			}

			return false;
    });

    $('.quantity-left-minus.btn.checkout').click(function(e){
        // Stop acting like a button
        e.preventDefault();

        var id = $(this).data('id');
        var price = $(this).data('price');

        // Get the field name
        var quantity = parseInt($('#quantity_'+id).val());
        var quantity_minus = parseInt(quantity-1);

        if (quantity_minus < 1)
    		{
    			$('#quantity_'+id).val(1);
    			alert('Не менее 1 шт.');
    		}
		else
			{
		        $('#quantity_'+id).val(quantity - 1);

		        $('#total_'+id).text(parseInt(quantity_minus * price) + ' p.');

		        var sum_price = 0;
				var sum_qty = 0;

				$("input[name='quantity").each(function (i, element){
				    
				    var price = $(this).data('price');
				    var qty = $(this).val();

				    sum_qty = parseInt(sum_qty) + parseInt(qty);

				    sum_price += parseInt(qty) * parseInt(price);;
				 
				});		        

				$("#cart-total-qty").text(sum_qty + ' шт.');
				$("#small-icon-cart").text(sum_qty); // обновление значка корзины

				$("#cart-total-cost-1").text(sum_price + ' p.');
				$("#cart-total-cost-2").text(sum_price + ' p.');		        

		// изменение стоимости товара при изменении количества товара в корзине

			    $.ajax({
			        type: "GET",
			        url: "/cart/checkout",
			        data: {id: id, quantity: quantity_minus, price: price},
			        success: function (response) {
			       
			        if(!response) alert('ошибка');


			    	},

					error: function() {
						alert('err');
					}
				});
			}

			return false;
    });
    
});
	


 AOS.init({
 	duration: 800,
 	easing: 'slide'
 });

(function($) {

	"use strict";

	$(window).stellar({
    responsive: true,
    parallaxBackgrounds: true,
    parallaxElements: true,
    horizontalScrolling: false,
    hideDistantElements: false,
    scrollProperty: 'scroll',
    horizontalOffset: 0,
	  verticalOffset: 0
  });

  // Scrollax
  $.Scrollax();


	var fullHeight = function() {

		$('.js-fullheight').css('height', $(window).height());
		$(window).resize(function(){
			$('.js-fullheight').css('height', $(window).height());
		});

	};
	fullHeight();

	// loader
	var loader = function() {
		setTimeout(function() { 
			if($('#ftco-loader').length > 0) {
				$('#ftco-loader').removeClass('show');
			}
		}, 1);
	};
	loader();

	// Scrollax
   $.Scrollax();

	var carousel = function() {
		$('.home-slider').owlCarousel({
	    loop:true,
	    autoplay: true,
	    autoplayTimeout: 9000,
	    margin:0,
	    animateOut: 'fadeOut',
	    animateIn: 'fadeIn',
	    nav:false,
	    autoplayHoverPause: false,
	    items: 1,
	    navText : ["<span class='ion-md-arrow-back'></span>","<span class='ion-chevron-right'></span>"],
	    responsive:{
	      0:{
	        items:1,
	        nav:false
	      },
	      600:{
	        items:1,
	        nav:false
	      },
	      1000:{
	        items:1,
	        nav:false
	      }
	    }
		});
		$('.carousel-work').owlCarousel({
			autoplay: true,
			center: true,
			loop: true,
			items:1,
			margin: 30,
			stagePadding:0,
			nav: true,
			navText: ['<span class="ion-ios-arrow-back">', '<span class="ion-ios-arrow-forward">'],
			responsive:{
				0:{
					items: 1,
					stagePadding: 0
				},
				600:{
					items: 2,
					stagePadding: 50
				},
				1000:{
					items: 3,
					stagePadding: 100
				}
			}
		});

	};
	carousel();

	$('nav .dropdown').hover(function(){
		var $this = $(this);
		// 	 timer;
		// clearTimeout(timer);
		$this.addClass('show');
		$this.find('> a').attr('aria-expanded', true);
		// $this.find('.dropdown-menu').addClass('animated-fast fadeInUp show');
		$this.find('.dropdown-menu').addClass('show');
	}, function(){
		var $this = $(this);
			// timer;
		// timer = setTimeout(function(){
			$this.removeClass('show');
			$this.find('> a').attr('aria-expanded', false);
			// $this.find('.dropdown-menu').removeClass('animated-fast fadeInUp show');
			$this.find('.dropdown-menu').removeClass('show');
		// }, 100);
	});


	$('#dropdown04').on('show.bs.dropdown', function () {
	  console.log('show');
	});

	// scroll
	var scrollWindow = function() {
		$(window).scroll(function(){
			var $w = $(this),
					st = $w.scrollTop(),
					navbar = $('.ftco_navbar'),
					sd = $('.js-scroll-wrap');

			if (st > 150) {
				if ( !navbar.hasClass('scrolled') ) {
					navbar.addClass('scrolled');	
				}
			} 
			if (st < 150) {
				if ( navbar.hasClass('scrolled') ) {
					navbar.removeClass('scrolled sleep');
				}
			} 
			if ( st > 350 ) {
				if ( !navbar.hasClass('awake') ) {
					navbar.addClass('awake');	
				}
				
				if(sd.length > 0) {
					sd.addClass('sleep');
				}
			}
			if ( st < 350 ) {
				if ( navbar.hasClass('awake') ) {
					navbar.removeClass('awake');
					navbar.addClass('sleep');
				}
				if(sd.length > 0) {
					sd.removeClass('sleep');
				}
			}
		});
	};
	scrollWindow();

	
	var counter = function() {
		
		$('#section-counter').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('ftco-animated') ) {

				var comma_separator_number_step = $.animateNumber.numberStepFactories.separator(',')
				$('.number').each(function(){
					var $this = $(this),
						num = $this.data('number');
						console.log(num);
					$this.animateNumber(
					  {
					    number: num,
					    numberStep: comma_separator_number_step
					  }, 7000
					);
				});
				
			}

		} , { offset: '95%' } );

	}
	counter();

	var contentWayPoint = function() {
		var i = 0;
		$('.ftco-animate').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('ftco-animated') ) {
				
				i++;

				$(this.element).addClass('item-animate');
				setTimeout(function(){

					$('body .ftco-animate.item-animate').each(function(k){
						var el = $(this);
						setTimeout( function () {
							var effect = el.data('animate-effect');
							if ( effect === 'fadeIn') {
								el.addClass('fadeIn ftco-animated');
							} else if ( effect === 'fadeInLeft') {
								el.addClass('fadeInLeft ftco-animated');
							} else if ( effect === 'fadeInRight') {
								el.addClass('fadeInRight ftco-animated');
							} else {
								el.addClass('fadeInUp ftco-animated');
							}
							el.removeClass('item-animate');
						},  k * 50, 'easeInOutExpo' );
					});
					
				}, 100);
				
			}

		} , { offset: '95%' } );
	};
	contentWayPoint();


	// navigation
	var OnePageNav = function() {
		$(".smoothscroll[href^='#'], #ftco-nav ul li a[href^='#']").on('click', function(e) {
		 	e.preventDefault();

		 	var hash = this.hash,
		 			navToggler = $('.navbar-toggler');
		 	$('html, body').animate({
		    scrollTop: $(hash).offset().top
		  }, 700, 'easeInOutExpo', function(){
		    window.location.hash = hash;
		  });


		  if ( navToggler.is(':visible') ) {
		  	navToggler.click();
		  }
		});
		$('body').on('activate.bs.scrollspy', function () {
		  console.log('nice');
		})
	};
	OnePageNav();


	// magnific popup
	$('.image-popup').magnificPopup({
    type: 'image',
    closeOnContentClick: true,
    closeBtnInside: true,
    fixedContentPos: true,
    mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
     gallery: {
      enabled: true,
      navigateByImgClick: true,
      preload: [0,1] // Will preload 0 - before current, and 1 after the current image
    },
    image: {
      verticalFit: true
    },
    zoom: {
      enabled: true,
      duration: 300 // don't foget to change the duration also in CSS
    }
  });

  $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
    disableOn: 700,
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,

    fixedContentPos: false
  });


  $('.appointment_date').datepicker({
	  'format': 'dd-mm-yyyy',
	  'autoclose': true,
	  todayHighlight: true,
	  weekStart: 1,
	  clearBtn: true
	});

	$('.appointment_time').timepicker({
    'step': 10,
    'timeFormat': 'H:i'
	  
	});




})(jQuery);

