<?php
class Book {
    private $title;
    private $availableCopies;
    public function __construct($title, $availableCopies) {
        $this->title = $title;
        $this->availableCopies = $availableCopies;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getAvailableCopies() {
        return $this->availableCopies;
    }

    public function borrowBook() {
        if ($this->availableCopies > 0) {
            $this->availableCopies--;
            return true; 
        } else {
            return false; 
        }
    }

    public function returnBook() {
      
        $this->availableCopies++;
    }
}

class Member {
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function borrowBook(Book $book) {
     
        if ($book->borrowBook()) {
            echo "{$this->name} borrowed {$book->getTitle()}\n";
        } else {
            echo "{$this->name} couldn't borrow {$book->getTitle()} (no available copies)\n";
        }
    }

    public function returnBook(Book $book) {
        $book->returnBook();
        echo "{$this->name} returned {$book->getTitle()}\n";

    }
}

// Create 2 books
$book1 = new Book("The Great Gatsby", 5);
$book2 = new Book("To Kill a Mockingbird", 3);

// Create 2 members
$member1 = new Member("Member One");
$member2 = new Member("Member Two");

$member1->borrowBook($book1);
$member2->borrowBook($book2);

echo "Available copies of {$book1->getTitle()}: {$book1->getAvailableCopies()}\n";
echo "Available copies of {$book2->getTitle()}: {$book2->getAvailableCopies()}\n";

?>