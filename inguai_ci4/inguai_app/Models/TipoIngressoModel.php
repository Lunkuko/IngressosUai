<?php
namespace App\Models;

use CodeIgniter\Model;

class TipoIngressoModel extends Model
{
	/*
		CREATE TABLE tbl_tipo_ingresso (
			ting_id INT(11) NOT NULL AUTO_INCREMENT,
			ting_hashkey VARCHAR(250) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
			ting_urlpage VARCHAR(250) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
			ting_titulo VARCHAR(250) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
			ting_descricao VARCHAR(250) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
			ting_vlr_ingresso DECIMAL(10,2) NULL DEFAULT '0.00',
			ting_vlr_servico DECIMAL(10,2) NULL DEFAULT '0.00',
			ting_qtd_ingressos INT(11) NULL DEFAULT '0',
			ting_dte_cadastro DATETIME NULL DEFAULT NULL,
			ting_dte_alteracao DATETIME NULL DEFAULT NULL,
			ting_ativo TINYINT(4) NULL DEFAULT '0',
			PRIMARY KEY (ting_id) USING BTREE,
			UNIQUE INDEX tpto_id (ting_id) USING BTREE
		)
		COLLATE='utf8_general_ci'
		ENGINE=MyISAM
		;
	*/

	protected $db = null;
    protected $table = 'tbl_tipo_ingresso';
	protected $primaryKey = 'ting_id';
	protected $useAutoIncrement = true;
	protected $returnType = 'object';
    protected $allowedFields = [
		'ting_hashkey',
		'ting_urlpage',
		'ting_titulo',
		'ting_descricao',
		'ting_vlr_ingresso',
		'ting_vlr_servico', 
		'ting_qtd_ingressos',
		'ting_dte_cadastro',
		'ting_dte_alteracao',
		'ting_ativo',
    ];

    protected function initialize()
    {
		$db = \Config\Database::connect();
    }

}