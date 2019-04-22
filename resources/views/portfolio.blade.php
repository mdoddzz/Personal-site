@extends('master')

@section('headTitle', 'Portfolio')
@section('pageTitle', 'Portfolio.')
@section('description')
A collection of what I spend my free time doing
@endsection

@section('contetn')

<div class="tabbedContainer">

    <ul class="tabRow">
        <li tabLinkId="githubPortfolio">Personal Github</li>
        <li tabLinkId="employedPortfolio">Employed</li>
    </ul>

    <div id="githubPortfolio">

        <!-- In the style of github -->

    </div>

    <div id="employedPortfolio">

        <!-- similar to blog items -->

    </div>

</div>

@endsection