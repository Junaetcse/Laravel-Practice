<?php

function getUserFullName($id) {
    $data = \DB::table('users')
        ->select(\DB::raw('CONCAT("Name: ", name, ", Email: ", email) as userinfo'))
        ->where('id', $id)
        ->first();
    return $data->userinfo;
}
