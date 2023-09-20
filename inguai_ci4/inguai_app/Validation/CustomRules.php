<?php
namespace App\Validation;

class CustomRules{


	// Rule is to validate mobile number digits
	public function mobileValidation(string $str, string $fields, array $data){

		/*Checking: Number must start from 5-9{Rest Numbers}*/
		if(preg_match( '/^[5-9]{1}[0-9]+/', $data['mobile'])){

			/*Checking: Mobile number must be of 10 digits*/
			$bool = preg_match('/^[0-9]{10}+$/', $data['mobile']);
			return $bool == 0 ? false : true; 

		}else{

			return false;

		}
	}


	public function validar_cpf(string $cpf): bool 
	{
		// função fct_valida_cpf existente no arquivo funcoes_helper
		if( fct_valida_cpf( $cpf ) )
		{
			return true;
		}else{
			return false;
		}
	}

	public function validar_cnpj(string $cnpj): bool 
	{
		// função fct_valida_cnpj existente no arquivo funcoes_helper
		if( fct_valida_cnpj( $cnpj ) )
		{
			return true;
		}else{
			return false;
		}
	}

	

}
