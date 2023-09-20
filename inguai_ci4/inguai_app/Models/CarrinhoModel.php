<?php
namespace App\Models;

use CodeIgniter\Model;

class CarrinhoModel extends Model
{
	/*
		CREATE TABLE tbl_carrinho (
			cart_id INT(11) NOT NULL AUTO_INCREMENT,
			cad_id INT(11) NOT NULL DEFAULT '0',
			ting_id INT(11) NOT NULL DEFAULT '0',
			evto_id INT(11) NOT NULL DEFAULT '0',
			cart_hashkey VARCHAR(250) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
			cart_urlpage VARCHAR(250) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
			cart_quant INT(11) NULL DEFAULT NULL,
			cart_dte_cadastro DATETIME NULL DEFAULT NULL,
			cart_dte_alteracao DATETIME NULL DEFAULT NULL,
			cart_ativo TINYINT(4) NULL DEFAULT '0',
			PRIMARY KEY (cart_id, cad_id) USING BTREE,
			UNIQUE INDEX cart_id (cart_id) USING BTREE
		)
		COLLATE='utf8_general_ci'
		ENGINE=MyISAM
		;
	*/

	protected $db = null;
    protected $table = 'tbl_carrinho';
	protected $primaryKey = 'cart_id';
	protected $useAutoIncrement = true;
	protected $returnType = 'object';
    protected $allowedFields = [
		'cad_id',
		'ting_id',
		'evto_id',
		'cart_hashkey',
		'cart_quant',
		'cart_dte_cadastro',
		'cart_dte_alteracao',
		'cart_ativo',
    ];

    protected function initialize()
    {
		$db = \Config\Database::connect();
    }

}