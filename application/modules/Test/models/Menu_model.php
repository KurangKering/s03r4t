<?php
class Menu_model extends CI_Model {

	public function all()
	{
		  $otherdb = $this->load->database('others', TRUE); // the TRUE paramater tells CI that you'd like to return the database object.
		  return $otherdb->get("menus")
		  ->result_array();
		}

	}