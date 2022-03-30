<?php

class ContributorPage extends Page {

  public function sortName() {
    $fullname = $this->title();

    if ($this->contributor_type()->value() == 'company') {
      return $fullname;
    }

    $parser = new TheIconic\NameParser\Parser();
    $name = $parser->parse($this->title());
    if ($name->getLastname()) {
      return $name->getLastname();
    }

    return $fullname;
  }

  public function formatDegree($degree) {
    $output = [];
    if ($degree->degree()->isNotEmpty()) {
      $name = $degree->degree()->value();
      if ($name == 'other') {
        $output[] = $degree->other_degree();
      } else {
        $options = $this->blueprint()->field('degrees')['fields']['degree']['options'];
        $output[] = ($options[$name] ?? $name);
      }
    }
    if ($degree->year()->isNotEmpty()) {
      $output[] = $degree->year();
    }
    if ($degree->affiliation()->isNotEmpty()) {
      $affiliation = $degree->affiliation()->value();
      if ($affiliation == 'other') {
        $output[] = $degree->other_affiliation();
      } else {
        $options = $this->blueprint()->field('degrees')['fields']['affiliation']['options'];
        $output[] = ($options[$affiliation] ?? $affiliation);
      }
    }
    return join(', ', $output);
  }

  public function formatTitle($title) {
    $output = [];
    if ($title->title()->isNotEmpty()) {
      $output[] = $title->title();
    }
    if ($title->affiliation()->isNotEmpty()) {
      $affiliation = $title->affiliation()->value();
      if ($affiliation == 'other') {
        $output[] = $title->other_affiliation();
      } else {
        $options = $this->blueprint()->field('titles')['fields']['affiliation']['options'];
        $output[] = ($options[$affiliation] ?? $affiliation);
      }
    }
    return join(', ', $output);
  }

}