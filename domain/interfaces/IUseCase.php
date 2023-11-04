<?php
interface IUseCase {
    public function execute(array $args = []): mixed;
}