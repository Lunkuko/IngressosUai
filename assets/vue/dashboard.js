
/**
 * --------------------------------------------------------
 * ini : CADASTRO
 * --------------------------------------------------------
**/	
var vue = new Vue({
	el : "#appCabine",

	data : {
		fcabine : { 
			filename : "",
			moldura : "",
		},
		error : { 
			filename : "",
			moldura : "",
		},
		boxloading : { active : false },
		boxdowload : { active : false },
		selmoldura : { active : false },

		urlPost : URL_BASE,
		messageResult : '',
		imgmoldura: 'assets/images/molduras/1.png',
		preview : null,
		image : null
	},

	methods : {
		SendSaveFoto : function(){
			if(this.ValidateForm()){
				vue.boxloading.active = true;

				let formData = new FormData();
				formData.append('fileUpload', this.image);
				formData.append('moldura', vue.fcabine.moldura);
				//console.log( vue.fcabine.moldura );

				axios.post(this.urlPost +'ajaxform/upload', formData, {
				headers: {
					'Content-Type': 'multipart/form-data'
				}
				}).then(function(response){
					vue.boxloading.active = false;
					vue.boxdowload.active = true;
				});
			}else{
				return false;
			}
		},
		selectMoldura: function (moldura) {
			vue.selmoldura = moldura;
			vue.fcabine.moldura = moldura; 
			vue.imgmoldura = 'assets/images/molduras/'+ moldura +'.png';
		},
		formData : function(obj){
			var formData = new FormData();
			for(var key in obj){
				formData.append(key, obj[key]);
			}
			return formData;
		},
		ValidateForm : function(){
			let error = 0;
			vue.ResetError();
			if ( this.$refs.fileInput.files.length == 0)
			{
				error++;
				alert('selecione uma foto para aplicar a moldura');
				return false;
			}
			if(this.fcabine.moldura.length == 0){
				error++;
				alert('selecione a moldura desejada');
				return false;
			}
			return (error === 0);
		},
		ResetForm : function(){
			this.fcabine.filename = "";
			this.fcabine.moldura = "";
		},
		ResetError : function(){
			this.error.filename = '';
			this.error.moldura = '';
		},
		closeLoading : function(){
			vue.boxloading.active = false;
		},
		closeDownload : function(){
			vue.boxdowload.active = false;
		},
		selectImage : function() {
			this.$refs.fileInput.click();
		},
		pickFile : function(){
			let input = this.$refs.fileInput
			let file = input.files
			if (file && file[0]) {
				var reader = new FileReader();
				reader.onload = (e) => {
					this.preview = e.target.result;
				}
				this.image = input.files[0];
				reader.readAsDataURL(input.files[0]);
				this.$emit('input', file[0])
			}
		}
	},

	computed: {
	},
});
/**
 * --------------------------------------------------------
 * end : CADASTRO
 * --------------------------------------------------------
**/	

