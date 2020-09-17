<?php
class FoldPage extends Page {
    public function formattedNumber() {
        return 'Vol. ' . $this->volume() . ', ' . 'No. ' . sprintf('%02d', $this->number()->value());
    }
    public function formattedDate() {
        return $this->publication_date()->toDate('F j, Y');
    }
}
