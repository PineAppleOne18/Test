<?php
session_start();
$conn = new mysqli("localhost", "root", "", "insurance_company");
$conn->set_charset("utf8mb4");