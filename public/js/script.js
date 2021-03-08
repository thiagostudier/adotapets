// CAROUSEL SLICK

$('.carousel-pets').slick({
    arrows: true,
    dots: true,
    infinite: false,
    speed: 300,
    slidesToShow: 5,
    slidesToScroll: 4,
    responsive: [
        {
            breakpoint: 1024,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                dots: true
            }
        },
        {
            breakpoint: 600,
            settings: {
                slidesToShow: 2,
                slidesToScroll: 2
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1
            }
        }
        
    ]
});

// end CAROUSEL SLICK
$('.carousel-pet').slick({
	slidesToShow: 1,
	slidesToScroll: 1,
	arrows: true,
	fade: true,
	asNavFor: '.carousel-pet-nav',
	autoplay: true
});

$('.carousel-pet-nav').slick({
	slidesToShow: 4,
	slidesToScroll: 1,
	asNavFor: '.carousel-pet',
	dots: false,
	// centerMode: true,
	focusOnSelect: true,
	arrows: false,
	responsive: [
		{
            breakpoint: 600,
            settings: {
                slidesToShow: 3,
				slidesToScroll: 1,
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 3,
				slidesToScroll: 1,
            }
        }
        
    ]
});

// NAVBAR FIXO

function menu_fixo(){
    height = $(".navbar").height();
    $("body").css("padding-top", height);
}

function verify_border(){
    var height = $(window).scrollTop();

    if(height  > 50) {
        $(".navbar").css("box-shadow", "rgb(139 139 139) 0px 0px 15px");
    }else{
        $(".navbar").css("box-shadow", "none");
    }
}

menu_fixo();
verify_border();

// TIPPY
tippy('.tooltip-tippy', {
    arrow: true,	
    theme: 'light',
    interactive: 'true',
});

$( window ).resize(function() {
    menu_fixo();
    verify_border();
});

$(window).scroll(function() {
    verify_border();
});

setTimeout(function(){ menu_fixo();verify_border();}, 100);

// DROPDOWN MENU HOVER

$('ul.nav li.dropdown').hover(function() {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeIn(500);
  }, function() {
    $(this).find('.dropdown-menu').stop(true, true).delay(200).fadeOut(500);
});

// JQUERY MASK
$('#cep').mask('00.000-000', {reverse: true});
// MÁSCARA DE CAMPOS TELEFONE
jQuery(".telefone")
.mask("(99)99999-9999")
.focusout(function (event) {
	var target, phone, element;
	target = (event.currentTarget) ? event.currentTarget : event.srcElement;
	phone = target.value.replace(/\D/g, ''); //Remove tudo o que não é dígito
	element = $(target);
	element.unmask();
	if(phone.length > 10) {
		element.mask("(99)99999-9999");
	} else {
		element.mask("(99)9999-9999");
	}
});
jQuery(".celular")
.mask("(99)99999-9999")
.focusout(function (event) {
	var target, phone, element;
	target = (event.currentTarget) ? event.currentTarget : event.srcElement;
	phone = target.value.replace(/\D/g, ''); //Remove tudo o que não é dígito
	element = $(target);
	element.unmask();
	if(phone.length > 10) {
		element.mask("(99)99999-9999");
	} else {
		element.mask("(99)9999-9999");
	}
});

// FUNÇÃO CEP 
function limpa_formulário_cep() {
	//Limpa valores do formulário de cep.
	document.getElementById('rua').value=("");
	document.getElementById('bairro').value=("");
	document.getElementById('cidade').value=("");
	document.getElementById('uf').value=("");
}

function meu_callback(conteudo) {
if (!("erro" in conteudo)) {
	//Atualiza os campos com os valores.
	document.getElementById('rua').value=(conteudo.logradouro);
	document.getElementById('bairro').value=(conteudo.bairro);
	document.getElementById('cidade').value=(conteudo.localidade);
	document.getElementById('uf').value=(conteudo.uf);
} //end if.
else {
	//CEP não Encontrado.
	limpa_formulário_cep();
	alert("CEP não encontrado.");
}
}

function pesquisacep(valor) {

//Nova variável "cep" somente com dígitos.
var cep = valor.replace(/\D/g, '');

//Verifica se campo cep possui valor informado.
if (cep != "") {

	//Expressão regular para validar o CEP.
	var validacep = /^[0-9]{8}$/;

	//Valida o formato do CEP.
	if(validacep.test(cep)) {

		//Preenche os campos com "..." enquanto consulta webservice.
		document.getElementById('rua').value="...";
		document.getElementById('bairro').value="...";
		document.getElementById('cidade').value="...";
		document.getElementById('uf').value="...";

		//Cria um elemento javascript.
		var script = document.createElement('script');

		//Sincroniza com o callback.
		script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

		//Insere script no documento e carrega o conteúdo.
		document.body.appendChild(script);

	} //end if.
	else {
		//cep é inválido.
		limpa_formulário_cep();
		alert("Formato de CEP inválido.");
	}
} //end if.
else {
	//cep sem valor, limpa formulário.
	limpa_formulário_cep();
}
};

$.getJSON('/js/lista_uf.json', function (data) {
	var items = [];
	var options = '<option value="">Estado</option>';	
	$.each(data, function (key, val) {
		options += '<option value="' + val.sigla + '">' + val.sigla + '</option>';
	});			

	$(".uf").append(options);				
	
	$(".uf").change(function () {	

		var municipio = $('.municipio').val();
	
		var options_cidades = '';
		var str = "";					
		
		$(".uf option:selected").each(function () {
			str += $(this).text();
		});
		
		$.each(data, function (key, val) {
			if(val.sigla == str) {	

				$.each(val.cidades, function (key_city, val_city) {

					// MANTER O MUNICÍPIO SELECIONADO
					if(municipio == val_city){
						options_cidades += "<option selected value='" + val_city + "'>" + val_city + "</option>";
					}else{
						options_cidades += "<option value='" + val_city + "'>" + val_city + "</option>";
					}

				});			

			}
		});

		$(".municipio").html("");
		$(".municipio").html('<option value="">Município</option>');
		$(".municipio").append(options_cidades);

		
	}).change();		

});

// DATATABLE

$(document).ready( function () {
    $('.datatable').DataTable({
		"columnDefs": [{ type: 'portugues', targets: "_all" }],
    	"language": {"url": "//cdn.datatables.net/plug-ins/1.10.20/i18n/Portuguese-Brasil.json"},
		aaSorting: [[0, 'desc']]
	});
} );

// FUNCTION OPEN SEARCH ON MOBILE
if($(".search-dogs").length){
    $(".navbar-toggler-search").show();
}else{
    $(".navbar-toggler-search").hide();
}

$(".navbar-toggler-search").click(function(){
	if($(this).hasClass('open')){
		console.log('fechar')
		$(".search-dogs-animate").hide();
		$(".search-dog-page-hide-mobile").hide();
		$(this).removeClass('open');
		$('html, body').animate({
			scrollTop: $("body").offset().top
		}, 500);
	}else{
		console.log('abrir');
		$(".search-dog-page-hide-mobile").show();
		$(".search-dogs-animate").show();
		$(this).addClass('open');
		$('html, body').animate({
			scrollTop: $("body").offset().top 
		}, 500);
	}
});

$(".navbar-toggler-menu").click(function(){
	$(".search-dogs-animate").slideUp();
	$(".search-dog-page-hide-mobile").slideUp();
	$(".navbar-toggler-search").removeClass('open');
});