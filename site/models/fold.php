<?php
class FoldPage extends Page {
    public function formattedNumber() {
        return 'Vol. ' . $this->volume() . ', ' . 'No. ' . $this->number();
    }
    public function formattedDate() {
        return $this->publication_date()->toDate('F j, Y');
    }
}
