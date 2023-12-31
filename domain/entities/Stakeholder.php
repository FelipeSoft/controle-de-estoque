<?php
class Stakeholder {
    public function __construct(
        public string $name,
        public string $email,
        public string $contact_number,
        public string $created_at,
        public string $updated_at,
        public int | null $stakeholder_id
    ) {}
}