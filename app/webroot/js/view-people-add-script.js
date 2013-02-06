$(document).ready(function(){

	$('#celular').focusout(function(){
		
		var phone, element;
		
		element = $(this);
		
		element.unmask();

		phone = element.val().replace(/\D/g, '');
		
		if(phone.length > 10)
		{
			element.mask("(99) 99999-999?9");
		}
		else
		{
			element.mask("(99) 9999-9999?9");
		}

	}).trigger('focusout');

	$('#telefone').mask("(99) 9999-9999");

	$('#cpf').mask("999.999.999-99");


$('#rg').focusout(function(){
		
		var rg, element;
		
		element = $(this);
		
		element.unmask();

		rg = element.val().replace(/-/g, '');
		rg = rg.replace(/./g, '');
		rg = rg.replace(/_/g, '');
		
		if (rg.length == 8)
		{
			element.mask("*.999.999-*?**");
		}
		else if (rg.length == 7)
		{
			element.mask("999.999-?***");
		}
		else
		{
			element.mask("**.999.9**-*");
		}

	}).trigger('focusout');

	$('#rg').mask("**.999.999-*");

});
