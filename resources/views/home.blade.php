@extends('master')

@section('headTitle', 'Home')
@section('pageTitle', 'Welcome.')
@section('description')
I am Michael Dodd. A Junior developer with a range of skills
<br>
HTML, CSS, JAVASCRIPT, PHP, SWIFT
@endsection

@section('content')

<?php

$colour_array = Config::get('constants.app_colours');
$home_shapes = Config::get('constants.home_shapes');

?>

<div class="boxContainerSplit thirdContainer">

    <?php
    for($i = 1; $i <= 9; $i++) {

        $shape = $home_shapes[array_rand($home_shapes)];
        if($shape == "twoThirds" && $i % 3 == 0) {
            $shape = "";
        } else if($shape == "twoThirds") {
            $i++;
        }
        ?>
        <div class="boxContainer {{ $shape }} {{ $colour_array[array_rand($colour_array)] }}">

            <p class="boxType">Blog</p>
            <p class="boxTitle">Check out this amazing blog post</p>

            <a class="boxButton">Button</a>

        </div>
    <?php
    }
    ?>

</div>

@endSection