<?php
require __DIR__.'/../../autoload.php';

use DesignPatterns\Adapter\Person;
use DesignPatterns\Adapter\Book;
use DesignPatterns\Adapter\Kindle;
use DesignPatterns\Adapter\EReaderAdapter;
use DesignPatterns\Adapter\Kobo;

(new Person)->read(new Book);
(new Person)->read(new EReaderAdapter(new Kindle));
(new Person)->read(new EReaderAdapter(new Kobo));

/*
Book and Kindle use different interfaces but person requires a common interface
so we use the EReaderAdapter to create a conforming wrapper for this.
*/