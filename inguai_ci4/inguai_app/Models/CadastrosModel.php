<?php
namespace App\Models;

use CodeIgniter\Model;

class CadastrosModel extends Model
{
	/*
		CREATE TABLE `tbl_cadastros` (
			cad_id INT(11) NOT NULL AUTO_INCREMENT,
			cad_hashkey VARCHAR(250) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
			cad_urlpage VARCHAR(250) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
			cad_nome VARCHAR(250) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
			cad_email VARCHAR(250) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
			cad_senha VARCHAR(250) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
			cad_cpf VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
			cad_telefone VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
			cad_dtenascto DATE NULL DEFAULT NULL,
			cad_cep VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
			cad_endereco VARCHAR(250) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
			cad_end_numero VARCHAR(250) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
			cad_end_complemento VARCHAR(250) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
			cad_bairro VARCHAR(250) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
			cad_cidade VARCHAR(250) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
			cad_estado VARCHAR(250) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
			cad_dte_cadastro DATETIME NULL DEFAULT NULL,
			cad_dte_alteracao DATETIME NULL DEFAULT NULL,
			cad_ativo TINYINT(4) NULL DEFAULT '0',
			PRIMARY KEY (cad_id) USING BTREE,
			UNIQUE INDEX cad_id (cad_id) USING BTREE
		)
		COLLATE='utf8_general_ci'
		ENGINE=MyISAM
		;
	*/

	protected $db = null;
    protected $table = 'tbl_cadastros';
	protected $primaryKey = 'cad_id';
	protected $useAutoIncrement = true;
	protected $returnType = 'object';
    protected $allowedFields = [
		'cad_hashkey',
		'cad_urlpage',
		'cad_nome',
		'cad_email',
		'cad_senha',
		'cad_cpf',
		'cad_telefone', 
		'cad_dtenascto', 
		'cad_cep',
		'cad_endereco',
		'cad_end_numero',
		'cad_end_complemento',
		'cad_bairro',
		'cad_cidade',
		'cad_estado', 
		'cad_dte_cadastro',
		'cad_dte_alteracao',
		'cad_ativo',
    ];

    protected function initialize()
    {
		$db = \Config\Database::connect();
    }

}