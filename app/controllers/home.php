<?php

class home extends Controller {
	public function index()
	{
		$data['title'] = 'Halaman Home';

		$this->view('home/index', $data);
	}
}