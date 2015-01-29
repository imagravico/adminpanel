<?php
	return [
		'domain'      => $faker->domainName,
		'online_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
		'active'      => $faker->boolean,
		'created_at'  => date('Y-m-d H:i:s'),
		'clients_id'  => $faker->numberBetween($min = 1, $max = 10)
	];
?>
