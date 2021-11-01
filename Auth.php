<?php

interface Authentication {
    public function is(): bool;
    public function authenticate(int $id);
    public function destory();
    public function credentail(): int;
    public function user(): ?User;
}
interface User {
}
interface UserRepository{
    public function create(string $email, string $password): Result;
    public function findByEmail(string $email): ?User;
    public function findById(string $id): ?User;
}
interface UserAuthenticatedEvent {
    public function id(): string;
}
interface UserCreatedEvent {
    public function id(): string;
}

