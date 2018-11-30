<?php
    Class CallApi {
    	// public $product_api = "http://35.198.247.32:32551/";
	    // public $old_product_api = "http://35.198.247.32:32551/";
	    // public $users_api = "http://35.198.247.32:32551/";
	    // public $payment_api = "http://35.198.247.32:32551/";
	    // public $payment_old_api;
    	public $kongApi = "http://35.198.247.32:32551/";


	    public function getApi(){
	    	return $this->kongApi;
	    }

	    public function getKongIP(){
	    	return '35.198.247.32';
	    }

	    // public function getProductApi(){
	    // 	return $this->kongApi;
	    // }

	    // public function getUsersApi(){
	    // 	return $this->kongApi;
	    // }

	    // public function getOldProductApi(){
	    // 	return $this->kongApi;
	    // }

	    // public function getPaymentApi(){
	    // 	return $this->kongApi;
	    // }

	    // public function getPaymentOldApi(){
	    // 	return $this->kongApi;
	    // }
    }
?>