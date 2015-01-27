<?php 
// users.php file under template path (by default @tests/unit/templates/fixtures)
/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */

return [
	'username'  => $faker->firstName,
	'firstname' => $faker->firstName,
	'lastname'  => $faker->lastName,
	'email'     => $faker->email,
	'password'  => '$2y$13$djseGQlCMk1rHXoRs3gnPubMQ6N9Tl0iZMf3uMXyGyoRKlLtDg2gy',
	'token'     => Yii::$app->getSecurity()->generateRandomString(),
	'active'    => $faker->boolean,
];

?>