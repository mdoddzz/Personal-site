@extends('master')

@section('headTitle', 'Portfolio')
@section('pageTitle', 'Portfolio.')
@section('description')
A collection of what I spend my free time doing
@endsection

@section('content')

<div class="portfolioList">

    <div class="portfolioContainer">

        <img class="portfolioImg" src="https://countrylakesdental.com/wp-content/uploads/2016/10/orionthemes-placeholder-image.jpg" />

        <div>

            <h4>Portfolio item title</h4>

            <p>Short description of the project goes here saying what it does</p>

            <ul class="portfolioTags">
                <li style="background-color: magenta">PHP</li>
                <li style="background-color: lightblue">mySQL</li>
                <li style="background-color: orange">JQuery</li>
            </ul>

            <div class="clearfix"></div>

            <a class="button">View Details</a>
            <a class="button">View Project</a>
            <a class="button"><i class="fab fa-github"></i> Git</a>

        </div>

    </div>

    <div class="portfolioContainer">

        <img class="portfolioImg" src="https://countrylakesdental.com/wp-content/uploads/2016/10/orionthemes-placeholder-image.jpg" />

        <div>

            <h4>Portfolio item title</h4>

            <p>Short description of the project goes here saying what it does</p>

            <ul class="portfolioTags">
                <li>PHP</li>
                <li>mySQL</li>
                <li>JQuery</li>
            </ul>

            <div class="clearfix"></div>

            <a class="button">View Details</a>
            <a class="button">View Project</a>

        </div>

    </div>

    <div class="portfolioContainer">

        <img class="portfolioImg" src="https://countrylakesdental.com/wp-content/uploads/2016/10/orionthemes-placeholder-image.jpg" />

        <div>

            <h4>Portfolio item title</h4>

            <p>Short description of the project goes here saying what it does</p>

            <ul class="portfolioTags">
                <li>PHP</li>
                <li>mySQL</li>
                <li>JQuery</li>
            </ul>

            <div class="clearfix"></div>

            <a class="button">View Details</a>
            <a class="button">View Project</a>

        </div>

    </div>

</div>

@endsection