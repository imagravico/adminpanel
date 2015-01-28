<?php

return [
	'company'   => $faker->company,
	'firstname' => $faker->firstName,
	'lastname'  => $faker->lastName,
	'email'     => $faker->email,
	'birthday'  => $faker->date($format = 'Y-m-d', $max = 'now'),
	'active'    => $faker->boolean,
];

?>
