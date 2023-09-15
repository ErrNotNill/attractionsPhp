<?php


class Sight
{
    public function __construct(
        public ?int    $sight_id = null,
        public ?string $title = null,
        public ?string $distance = null,
    )
    {
    }
}

class City
{
    public function __construct(
        public int     $cityID,
        public ?string $title = null,
    )
    {
    }
}

class Traveler
{
    public function __construct(
        public ?int    $traveler_id = null,
        public ?string $name = null,
    )
    {
    }
}

class Visit
{
    public function __construct(
        public ?int      $visit_id = null,
        public ?Sight    $sight_id = null,
        public ?Traveler $traveler_id = null,
        public ?string   $visit_date = null,
        public ?int      $rating = null,
    )
    {
    }
}

class Rating
{
    public function __construct(
        public ?int      $rating_id = null,
        public ?Sight    $sight_id = null,
        public ?Traveler $traveler_id = null,
        public ?int      $rating_value = null,
    )
    {
    }
}

// Usage examples:
$sight = new Sight(1, 'Sight Title', '5 miles');
$city = new City(1, 'City Name');
$traveler = new Traveler(1, 'Traveler Name');
$visit = new Visit(1, $sight, $traveler, '2023-09-15', 4);
$rating = new Rating(1, $sight, $traveler, 5);
