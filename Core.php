<?php
interface Error {
    public function message(): ?string;
    public function key(): ?string;
    public function source(): ?string;
}
interface Errors {
    public function errors(): array;
    // public function map(callable $mapper): static;
    // public function each(callable $callback): static;
    // public function into(string $class): object;
    // public function any(): bool;
    // public function withPrefix(string $prefix): static;
    // public function filterPrefix(string $prefix): static;
    // public function add(Error $error): static;
    // public function addMsg(?string $message, ?string $key, ?string $source);
}
interface Result {
    // public static function ofSuccess(): static;
    // public static function ofFail(): static;
    // public static function ofValue(string $value): static;
    // public static function ofError(Error $error): static;
    // public static function ofErrors(Errors $collection): static;
    // public static function ofErrorMsg(string $message, ?int $code = null, ?string $key = null): static;
    // public static function combine(Result ...$results): Result;
    // public function addError(Error $error): static;
    // public function addErrorMsg(?string $message, ?string $key, ?string $source);
    // public function withErrorPrefix(string $prefix): static;
    // public function onSuccess(callable $callback): static;
    // public function onFail(callable $callback): static;
    // public function onBoth(callable $callback): static;
    // public function maps(callable $callback): static;
    public function success(): bool;
    public function fail(): bool;
    public function value(): mixed;
    public function errors(): Errors;
}
