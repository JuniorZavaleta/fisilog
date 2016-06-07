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

$factory->define(FisiLog\Models\User::class, function (Faker\Generator $faker) {
   return [
      'name' => str_replace('.', '', $faker->name),
      'email' => $faker->email,
      'lastname' => str_replace('.', '', $faker->name),
      'phone' => $faker->randomNumber(9),
      'notification_channel_id' => $faker->randomElement([1,2]),
      'user_type_id' => $faker->randomElement([1,2,3,4]),
      'password' => bcrypt(str_random(10)),
      'remember_token' => str_random(10),
   ];
});

$factory->define(FisiLog\Models\Document::class, function (Faker\Generator $faker) {
   return [
      'document_type_id' => $faker->randomElement([1,2,3]),
      'document_code' => $faker->randomNumber(9),
   ];
});

$factory->define(FisiLog\Models\Student::class, function (Faker\Generator $faker) {
   return [
      'school_id' => $faker->randomElement([60, 61]),
      'student_code' => $faker->randomNumber(9),
      'year_of_entry' => $faker->year(),
   ];
});
