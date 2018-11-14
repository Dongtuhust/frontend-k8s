<?php
    Class CallApi {
    	public $product_api = "http://35.185.178.104:32551/";
	    public $old_product_api = "http://35.185.178.104:32551/";
	    public $users_api = "http://35.185.178.104:32551/";
	    public $payment_api;
	    public $payment_old_api;

	    public function getProductApi(){
	    	return $this->product_api;
	    }

	    public function getUsersApi(){
	    	return $this->users_api;
	    }

	    public function getOldProductApi(){
	    	return $this->old_product_api;
	    }
    }
?>