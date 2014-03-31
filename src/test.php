<?php

		foreach(get_defined_functions() as $set => $fn_set) {
				echo $set . "--\n";
			foreach($fn_set as $fn) {
				if(is_string($fn) && strpos($fn, 'mb') !== FALSE) {
					echo $fn . "\n";
				}
			}
		}

		die;
