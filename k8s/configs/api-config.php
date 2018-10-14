<?php
    Class CallApi {
    	public $product_api = "http://localhost/product_api/";
	    public $old_product_api = "http://localhost/old_product_api/";
	    public $users_api = "http://localhost/users_api/";
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