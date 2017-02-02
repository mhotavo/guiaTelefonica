<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
	static $password;

	return [
	'name' => $faker->name,
	'email' => $faker->unique()->safeEmail,
	'password' => $password ?: $password = bcrypt('secret'),
	'remember_token' => str_random(10),
	];
});


$factory->define(App\Department::class, function (Faker\Generator $faker) {
	return [
	'name' => $faker->state,
	];
});

$factory->define(App\City::class, function (Faker\Generator $faker) {
	return [
	'name' => $faker->city,
	'idDepartment' => function () {
		return factory(App\Department::class)->create()->id;
	},
	];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
	return [
	'name' => $faker->jobTitle,
	];
});
#Company
$factory->define(App\Company::class, function (Faker\Generator $faker) {
	return [
	'name' => $faker->company,
	'idCategory' => function () {
		return factory(App\Category::class)->create()->id;
	},
	'description' =>   $faker->paragraph,
	'address' => $faker->streetAddress,
	'idCity' => function () {
		return factory(App\City::class)->create()->id;
	},
	'email' => $faker->unique()->safeEmail,
	'website' => $faker->url,
	];
});

#Person
$factory->define(App\Person::class, function (Faker\Generator $faker) {
	return [
	'firstName' => firstName($gender = null|'male'|'female') ,
	'surname' => $faker->lastname,
	'birthday' => $faker->dateTimeThisCentury->format('d-m-Y'),
	'address' => $faker->streetAddress,
	'idCity' => function () {
		return factory(App\City::class)->create()->id;
	},
	'profession' => $faker->jobTitle,
	'email' => $faker->unique()->safeEmail,
	'website' => $faker->url, 
	];
});

#Phone
$factory->define(App\Phone::class, function (Faker\Generator $faker) {
	return [
	'idCompany' => function () {
		return factory(App\Company::class)->create()->id;
	},
	/*'idPerson' => function () {
		return factory(App\Person::class)->create()->id;
	},*/
	'phone' => str_random(10),
	'extension' =>str_random(4),

	];
});