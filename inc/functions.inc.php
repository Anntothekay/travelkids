<?php

function logIn($id)
{
    session_regenerate_id(true); // Session Fixation
    $_SESSION['user_id'] = $id;
}

function isLoggedIn()
{
    return (isset($_SESSION['user_id']) && !empty($_SESSION['user_id']));
}

function logOut()
{
    unset($_SESSION['user_id']);
}

function saveTravelData($data) 
{
	$_SESSION['travel_data'] = $data;
}

function saveBookingData($data, $id)
{
    $_SESSION['booking_data'] = $data;
	$_SESSION['travel_id'] = $id;
}

function deleteBookingData()
{
    unset($_SESSION['booking_data']);
    unset($_SESSION['travel_id']);
}