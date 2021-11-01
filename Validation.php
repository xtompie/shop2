<?php

function __invoke(CreateUserCommand $command): Result {
    $result = Validate::run($command, function (Validator $v, CreateUserCommand $command) {
        // $v.
    });

    Validate::of($command)
        .test(fn(CreateUserCommand $command) => $command->email())
        // .test('email')
        // .test('[email]')
        // .test('email()')
            .notEmpty($msg, $key)
            .min(10)
            .email()
            .callback()
        .test('password()')
            .notEmpty()
        .group()
        .test('addresses()').min(2)
        .each('addresses()')
            .test('street()').required()
        .endEach()
    ;

    $result = Validation::of($command)
        .test('email()').required().email().max(255)
        .test('password()').min(8).validator(Password::class)
        .test('active()').typrBool()
        .test('name()').typeString().max(255)
        .test('surname()').string().max(255)
        .testGroup()
        .test('password').callback(fn(CreateUserCommand $command) => $command->email() != $command->password(), 'haslo nie moze byc takie jak')
        .testGroup()
        .test('email()').callback(fn($email) =>  $email != 'john.doe@example.com', 'Email jest juz zajety')
        .testIf(fn($command) => $command->password(), null, 'password_confirm').callback(fn(CreateUserCommand $command) => $command->password() == $command->passwordConfirm())
        .testResult()
    ;

    if ($result->fail()) {
        return $result;
    }

}