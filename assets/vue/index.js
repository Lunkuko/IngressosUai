

/**
 * --------------------------------------------------------
 * ini : INDEX
 * --------------------------------------------------------
**/	
var vue = new Vue({
	el : "#app",

	data : {
		lista_cargo : LIST_CARGO,
		lista_motiv_part : LIST_MOTIV_PART,
		lista_proc_compras : LIST_PROC_COMPRAS,
		lista_setor_interesse : LIST_SETOR_INTERESSE,

		fcadastro : { 
			nome : '',
			email : '',
			cpf : '',
			celular : '', 
			dtenascto : '', 

			cnpj : '', 
			empresa : '', 
			website : '', 
			cargo : '', 

			cidade : '', 
			estado : '', 
			pais : '', 

			segmento : '',
			setor_interesse : '',		// Em qual setor você tem mais interesse?
			interesse_outro : '',
			proc_compras : '',			// Qual é o seu papel no processo de compras?
			motiv_part : '',

			chk_privacidade : '',
		},
		error : { 
			nome : '',
			email : '',
			cpf : '',
			celular : '', 
			dtenascto : '', 

			cnpj : '', 
			empresa : '', 
			website : '', 
			cargo : '', 

			cidade : '', 
			estado : '', 
			pais : '', 

			segmento : '',
			setor_interesse : '',
			interesse_outro : '',
			proc_compras : '',
			motiv_part : '',

			chk_privacidade : '',
		},
		flogin : { 
			nome : '',
			email : '',
		},
		error_login : { 
			nome : '',
			email : '', 
		},
		overlay : { active : false },
		loading : { active : false },

		selpainel : 'null',

		urlPost : URL_BASE,
		messageResult : '',
		isCadDisabled : false,
		isLoginDisabled : false,
		isDisabledInteresse : true,
	},

	methods : {
		SendCadastro : function(){
			//vue.fcadastro.telefone2 = vue.fcadastro.telefone;
			if(this.ValidateForm()){
				vue.isCadDisabled = true;
				vue.openLoading();
				let form = this.formData(this.fcadastro);
				//alert( JSON.stringify(this.fcadastro, null, 4) );
				//return false;
				axios.post(this.urlPost +'/ajaxform/CADASTRO', form).then(function(response){
					vue.isCadDisabled = false;
					vue.closeLoading();
					console.log( response.data );
					if( response.data )
					{
						let respData = response.data;
						if( respData.error_num == '0' )
						{
							vue.ResetForm();
							vue.messageResult = respData.error_msg;	
							vue.openOverlay();
							setTimeout(() => {
								window.location.href = respData.redirect;
							}, 500);

						}else{
							vue.messageResult = respData.error_msg;	
							vue.openOverlay();
						}
					}
				});
			}else{
				return false;
			}
		},
		ValidateForm : function(){
			var error = 0;
			vue.ResetError();

			if(vue.fcadastro.nome.length == 0){
				vue.error.nome = "Campo requerido"; error++;
			}
			if(vue.fcadastro.email.length == 0){
				vue.error.email = "Campo requerido"; error++;
			}else {
				if(!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test( vue.fcadastro.email )) {
					vue.error.email = "E-mail inválido"; error++;
				}
			}
			if(vue.fcadastro.cpf.length == 0){
				vue.error.cpf = "Campo requerido"; error++;
			}
			if(vue.fcadastro.celular.length == 0){
				vue.error.celular = "Campo requerido"; error++;
			}
			if(vue.fcadastro.dtenascto.length == 0){
				vue.error.dtenascto = "Campo requerido"; error++;
			}
			if(vue.fcadastro.empresa.length == 0){
				vue.error.empresa = "Campo requerido"; error++;
			}
			if(vue.fcadastro.cnpj.length == 0){
				vue.error.cnpj = "Campo requerido"; error++;
			}
			if(vue.fcadastro.cargo.length == 0){
				vue.error.cargo = "Campo requerido"; error++;
			}
			if(vue.fcadastro.cidade.length == 0){
				vue.error.cidade = "Campo requerido"; error++;
			}
			if(vue.fcadastro.estado.length == 0){
				vue.error.estado = "Campo requerido"; error++;
			}
			if(vue.fcadastro.pais.length == 0){
				vue.error.pais = "Campo requerido"; error++;
			}
			if(vue.fcadastro.segmento.length == 0){
				vue.error.segmento = "Campo requerido"; error++;
			}
			if(vue.fcadastro.setor_interesse.length == 0){
				vue.error.setor_interesse = "Campo requerido"; error++;
			}
			if(vue.fcadastro.proc_compras.length == 0){
				vue.error.proc_compras = "Campo requerido"; error++;
			}
			if(vue.fcadastro.chk_privacidade.length == 0){
				vue.error.chk_privacidade = "Campo requerido"; error++;
			}
			return (error === 0);
		},
		ResetForm : function(){
			this.fcadastro.nome = '';
			this.fcadastro.email = '';
			this.fcadastro.empresa = '';
		},
		ResetError : function(){
			this.error.nome = '';
			this.error.email = '';
			this.error.cpf = '';
			this.error.celular = ''; 
			this.error.dtenascto = ''; 

			this.error.cnpj = ''; 
			this.error.empresa = ''; 
			this.error.website = ''; 
			this.error.cargo = ''; 

			this.error.cidade = ''; 
			this.error.estado = ''; 
			this.error.pais = ''; 

			this.error.segmento = '';
			this.error.setor_interesse = '';
			this.error.interesse_outro = '';
			this.error.proc_compras = '';
			this.error.motiv_part = '';

			this.error.chk_privacidade = '';
		},
		selectInteresse : function(event){
			vue.fcadastro.setor_interesse = event.target.value;
			var listOutros = ["outros"];
			if( listOutros.includes( event.target.value) ){
				vue.isDisabledInteresse = false;
			}else{
				vue.isDisabledInteresse = true;
				vue.fcadastro.interesse_outro = '';
			}
			//if( event.target.value == '3' ){
				//vue.isDisabledInteresse = false;	
			//}else{
				//vue.isDisabledInteresse = true;
				//vue.fcadastro.sexo_qual = '';
			//}
			//vueCadastro.isDisabledInteresse = listOutros.includes( event.target.value); 
		},

		SendLogin : function(){
			if(this.ValidateFormLogin()){
				vue.isLoginDisabled = true;
				vue.openLoading();
				let form = this.formData(this.flogin);
				//alert( JSON.stringify(this.flogin, null, 4) );
				//return false;
				axios.post(this.urlPost +'/ajaxform/LOGIN', form).then(function(response){
					vue.isLoginDisabled = false;
					vue.closeLoading();
					//console.log( response.data );
					if( response.data )
					{
						let respData = response.data;
						if( respData.error_num == '0' )
						{
							vue.ResetFormLogin();
							vue.messageResult = respData.error_msg;	
							vue.openOverlay();
							setTimeout(() => {
								window.location.href = respData.redirect;
							}, 500);
						}else{
							vue.messageResult = respData.error_msg;	
							vue.openOverlay();
						}
					}
				});
			}else{
				return false;
			}
		},
		ValidateFormLogin : function(){
			var error = 0;
			vue.Reseterror_login();

			if(vue.flogin.nome.length == 0){
				vue.error_login.nome = "Campo requerido"; error++;
			}
			if(vue.flogin.email.length == 0){
				vue.error_login.email = "Campo requerido"; error++;
			}else {
				if(!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test( vue.flogin.email )) {
					vue.error_login.email = "E-mail inválido"; error++;
				}
			}
			return (error === 0);
		},
		ResetFormLogin : function(){
			this.flogin.nome = '';
			this.flogin.email = '';
		},
		Reseterror_login : function(){
			this.error_login.nome = '';
			this.error_login.email = '';
		},

		formData : function(obj){
			var formData = new FormData();
			for(var key in obj){
				formData.append(key, obj[key]);
			}
			return formData;
		},
		openLoading : function(){
			vue.loading.active = true;
			document.body.classList.add('hideOverFlow');
		},
		closeLoading : function(){
			vue.loading.active = false;
			document.body.classList.remove('hideOverFlow')
		},
		openOverlay : function(){
			//vue.messageResult = 'teste';
			vue.overlay.active = true;
			document.body.classList.add('hideOverFlow');
		},
		closeOverlay : function(){
			vue.messageResult = '';	
			vue.overlay.active = false;
			document.body.classList.remove('hideOverFlow')
		},
	},

	computed: {
		//checkSenha: function () {
			//if( this.fcadastro.senha != this.fcadastro.confsenha ){
				//return false;
			//}else{
				//return true
			//}
		//}
	},

	mounted: function (){
		var SPMaskBehavior = function (val) {
			return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
		},
		spOptions = {
			placeholder: "(__) ____-____",
			onKeyPress: function(val, e, field, options) {
				field.mask(SPMaskBehavior.apply({}, arguments), options);
			}
		};
		$('.mask-phone').mask(SPMaskBehavior, spOptions);

		//$('.mask-phone-fixo').mask('(00) 0000-0000', {placeholder: "(__) ____-____"});
		//$('.mask-phone-cel').mask('(00) 00000-0000', {placeholder: "(__) _____-____"});




		//this.$nextTick(this.openLoading);
		//this.$nextTick(this.openOverlay);
	},

    //created: function(){
        //this.openLoading()
    //},
	//beforeMount(){
		//this.openLoading()
	//},
	directives: {
		attr: {
			bind: function (el, binding) {
				//console.log( vueCadastro.fcadastro.sexo );
				//console.log( binding.name );
				//console.log( binding.value );
				//console.log( binding.arg );
				el.setAttribute(binding.arg, binding.value)

				//if (binding.value === true) binding.value = ''
				//if (binding.value === '' || binding.value) {
					//el.setAttribute(binding.arg, binding.value)
				//}
			}
		}
	},
});

/**
 * --------------------------------------------------------
 * end : INDEX
 * --------------------------------------------------------
**/	
