<?php
include '../model/ProfileModel.php';

class ProfileController {
    private $model;

    public function __construct($conn) {
        $this->model = new ProfileModel($conn);
    }

    public function getUserProfile($userId) {
        return $this->model->getUserProfile($userId);
    }
}
?>