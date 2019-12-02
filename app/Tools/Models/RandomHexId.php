<?php

namespace App\Tools\Models;

use \Illuminate\Database\Eloquent\Builder;
use Psr\Log\InvalidArgumentException;


/**
 * Used for generation of binary primary keys. Requires users to set $model->incrementing to false
 * and adapt the primary key type to binary.
 */

trait RandomHexId {
	/**
 	 * Defines the length of the byte array ids to be generated.
	 *  Can be overriden by classes using this trait.
 	 *
 	 * @return int
	 */
	protected function getIdLength(){
		return 8;
	}

	/**
 	 * Generates random IDs
 	 *
 	 * @param type
 	 * @return string
	 */
	private function generateRandomId(){
		do {
			$binary = random_bytes(ceil($this->getIdLength()/2));
			$id = bin2hex($binary);
		} while( parent::where($this->getKeyName(), $id)->exists() );
		return $id;
	}

	/**
     * Perform a model insert operation.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return bool
     */
	protected function performInsert(Builder $query){
		$this->getConnection()->transaction(function() use($query) {
			$this->setAttribute($this->getKeyName(), $this->generateRandomId());
			return parent::performInsert($query);
		});
	}

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        $this->setKeyType('string');
    }
}
