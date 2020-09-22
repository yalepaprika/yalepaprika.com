<?php
class FoldPage extends Page {
    public function formattedDate() {
        return $this->publication_date()->toDate('F j, Y');
    }
}
