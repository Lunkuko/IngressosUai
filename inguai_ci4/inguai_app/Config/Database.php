<?php

namespace Config;

use CodeIgniter\Database\Config;

/**
 * Database Configuration
 */
class Database extends Config
{
	/**
	 * The directory that holds the Migrations
	 * and Seeds directories.
	 *
	 * @var string
	 */
	public $filesPath = APPPATH . 'Database' . DIRECTORY_SEPARATOR;

	/**
	 * Lets you choose which connection group to
	 * use if no other is specified.
	 *
	 * @var string
	 */

	public $defaultGroup = 'default_localhost';

	/**
	 * The default database connection.
	 *
	 * @var array
	 */
	public $default_localhost = [
		'DSN'      => '',

		'hostname' => 'localhost',
		'username' => 'root',
		'password' => '',
		'database' => 'uai_ingressos',
		'port'     => 3306,

		'DBDriver' => 'MySQLi',
		'DBPrefix' => '',
		'pConnect' => false,
		'DBDebug'  => (ENVIRONMENT !== 'production'),
		'charset'  => 'utf8',
		'DBCollat' => 'utf8_general_ci',
		'swapPre'  => '',
		'encrypt'  => false,
		'compress' => false,
		'strictOn' => false,
		'failover' => [],
	];


	/**
	 * The default database connection.
	 *
	 * @var array
	 */
	public $default_producao = [
		'DSN'      => '',

		// heroku
		'hostname' => 'us-cdbr-east-06.cleardb.net',
		'username' => 'b91f1cc76fa390',
		'password' => '0f58c7f9',
		'database' => 'heroku_288fef5ca58b85f',

		// misterlab
		//'hostname' => 'localhost',
		//'username' => 'miste079_usrtmp',
		//'password' => 'us3rT3p7102',
		//'database' => 'miste079_uai_ingressos',

		'DBDriver' => 'MySQLi',
		'DBPrefix' => '',
		'pConnect' => false,
		'DBDebug'  => (ENVIRONMENT !== 'production'),
		'charset'  => 'utf8',
		'DBCollat' => 'utf8_general_ci',
		'swapPre'  => '',
		'encrypt'  => false,
		'compress' => false,
		'strictOn' => false,
		'failover' => [],
	];


	/**
	 * This database connection is used when
	 * running PHPUnit database tests.
	 *
	 * @var array
	 */
	public $tests = [
		'DSN'      => '',
		'hostname' => 'localhost',
		'username' => 'root',
		'password' => '',
		'database' => '',
		'DBDriver' => 'MySQLi',
		'DBPrefix' => '',
		'pConnect' => false,
		'DBDebug'  => (ENVIRONMENT !== 'production'),
		'charset'  => 'utf8',
		'DBCollat' => 'utf8_general_ci',
		'swapPre'  => '',
		'encrypt'  => false,
		'compress' => false,
		'strictOn' => false,
		'failover' => [],
		'port'     => 3307,
	];

	//public $tests = [
		//'DSN'      => '',
		//'hostname' => '127.0.0.1',
		//'username' => '',
		//'password' => '',
		//'database' => ':memory:',
		//'DBDriver' => 'SQLite3',
		//'DBPrefix' => 'db_',  // Needed to ensure we're working correctly with prefixes live. DO NOT REMOVE FOR CI DEVS
		//'pConnect' => false,
		//'DBDebug'  => (ENVIRONMENT !== 'production'),
		//'charset'  => 'utf8',
		//'DBCollat' => 'utf8_general_ci',
		//'swapPre'  => '',
		//'encrypt'  => false,
		//'compress' => false,
		//'strictOn' => false,
		//'failover' => [],
		//'port'     => 3307,
	//];

	//--------------------------------------------------------------------

	public function __construct()
	{
		parent::__construct();

		// Ensure that we always set the database group to 'tests' if
		// we are currently running an automated test suite, so that
		// we don't overwrite live data on accident.
		//if (ENVIRONMENT === 'testing')
		//{
			//$this->defaultGroup = 'tests';
		//}

		$_CONST_SERVER_NAME = $_SERVER['SERVER_NAME'];
		if( $_CONST_SERVER_NAME == "localhost" ){
			$this->defaultGroup = 'default_localhost';
		}else{
			$this->defaultGroup = 'default_producao';
		}

	}

	//--------------------------------------------------------------------

}
