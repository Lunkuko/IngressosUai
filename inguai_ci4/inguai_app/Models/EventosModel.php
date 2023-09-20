<?php
namespace App\Models;

use CodeIgniter\Model;

class EventosModel extends Model
{
	/*
		CREATE TABLE tbl_eventos (
			evto_id INT(11) NOT NULL AUTO_INCREMENT,
			evto_hashkey VARCHAR(250) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
			evto_urlpage VARCHAR(250) NULL DEFAULT NULL COLLATE 'latin1_swedish_ci',
			evto_titulo VARCHAR(250) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
			evto_descricao VARCHAR(250) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
			evto_dte_evento VARCHAR(250) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
			evto_hour_evento VARCHAR(250) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
			evto_imagem VARCHAR(250) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
			evto_gratuito TINYINT(4) NULL DEFAULT '0',
			evto_dte_cadastro DATETIME NULL DEFAULT NULL,
			evto_dte_alteracao DATETIME NULL DEFAULT NULL,
			evto_ativo TINYINT(4) NULL DEFAULT '0',
			PRIMARY KEY (evto_id) USING BTREE,
			UNIQUE INDEX evto_id (evto_id) USING BTREE
		)
		COLLATE='utf8_general_ci'
		ENGINE=MyISAM
		AUTO_INCREMENT=1
		;
	*/

	protected $db = null;
    protected $table = 'tbl_eventos';
	protected $primaryKey = 'evto_id';
	protected $useAutoIncrement = true;
	protected $returnType = 'object';
    protected $allowedFields = [
		'evto_hashkey',
		'evto_urlpage',
		'evto_titulo',
		'evto_descricao',
		'evto_dte_evento',
		'evto_hour_evento',
		'evto_imagem', 
		'evto_gratuito',
		'evto_dte_cadastro',
		'evto_dte_alteracao',
		'evto_ativo',
    ];

    protected function initialize()
    {
		$db = \Config\Database::connect();
    }

}