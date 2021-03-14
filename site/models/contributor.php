<?php

class ContributorPage extends Page {

  public function lastnameFirstname() {
    $parser = new TheIconic\NameParser\Parser();
    $name = $parser->parse($this->title());

    $firstAndMiddleParts = [];
    if ($firstname = $name->getFirstname()) {
      $firstAndMiddleParts[] = $firstname;
    }
    if ($middlename = $name->getMiddlename()) {
      $firstAndMiddleParts[] = $middlename;
    }
    if ($initials = $name->getInitials()) {
      $firstAndMiddleParts[] = $initials;
    }
    $firstAndMiddle = implode(' ', $firstAndMiddleParts);

    $parts = [];
    if ($lastname = $name->getLastname()) {
      $parts[] =  $lastname;
    }
    if ($firstAndMiddle) {
      $parts[] = $firstAndMiddle;
    }
    if ($suffix = $name->getSuffix()) {
      $parts[] = $suffix;
    }

    return implode(', ', $parts);
  }

  public function alphabetizeOptions() {
    return [
      new \Kirby\Toolkit\Obj(['value' => 'lastname', 'text' => $this->lastnameFirstname() . ' (Last Name, First Name)']),
      new \Kirby\Toolkit\Obj(['value' => 'full', 'text' => $this->title() . ' (Full Title)']),
      new \Kirby\Toolkit\Obj(['value' => 'other', 'text' => 'Other'])
    ];
  }
}
