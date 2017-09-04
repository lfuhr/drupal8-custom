<?php

namespace Drupal\fgz_formular_prefill\Plugin\views\sort;

use Drupal\views\Plugin\views\sort\SortPluginBase;

/**
 * Basic sort handler for Events.
 *
 * @ViewsSort("sortByLastname")
 */
class SortByLastname extends SortPluginBase {
	 public function query() {

	 	// Supported only by MariaDB
    	//$this->query->addOrderBy(NULL, "REGEXP_REPLACE(name ,'[^,]* (\\\\S*),','\\\\1')");

    	// Supported by Mysql
	 	$this->query->addOrderBy(NULL, "SUBSTRING_INDEX( REVERSE( SUBSTRING_INDEX( REVERSE(name), ',', -1) ) , ' ', -1)");

    	// mit .* am Ende geht es irgendwie nicht. Hab noch nicht rausbekommen warum.
      	//$this->query->addOrderBy(NULL, "REGEXP_REPLACE(name ,'[^,]* (\\\\S*),.*','\\\\1')");
    }
}