<?

$boxContainerColorArray = array("", "green", "blue");

?>

<h1>Welcome.</h1>
<h3>I am Michael Dodd. A Junior developer with a range of skills<br>HTML, CSS, JAVASCRIPT, PHP, SWIFT</h3>

<div class="boxContainerSplit thirdContainer">

    <div class="boxContainer twoThirds <?= $boxContainerColorArray[array_rand($boxContainerColorArray, 1)] ?>">

        <p class="boxType">Blog</p>
        <p class="boxTitle">Check out this amazing blog post</p>

        <a class="boxButton">Button</a>

    </div>

    <div class="boxContainer <?= $boxContainerColorArray[array_rand($boxContainerColorArray, 1)] ?>">

        <p class="boxType">Blog</p>
        <p class="boxTitle">Check out this amazing blog post</p>

        <a class="boxButton">Button</a>

    </div>

    <div class="boxContainer <?= $boxContainerColorArray[array_rand($boxContainerColorArray, 1)] ?>">

        <p class="boxType">Blog</p>
        <p class="boxTitle">Check out this amazing blog post</p>

        <a class="boxButton">Button</a>

    </div>

    <div class="boxContainer twoThirds <?= $boxContainerColorArray[array_rand($boxContainerColorArray, 1)] ?>">

        <p class="boxType">Blog</p>
        <p class="boxTitle">Check out this amazing blog post</p>

        <a class="boxButton">Button</a>

    </div>

    <div class="boxContainer <?= $boxContainerColorArray[array_rand($boxContainerColorArray, 1)] ?>">

        <p class="boxType">Blog</p>
        <p class="boxTitle">Check out this amazing blog post</p>

        <a class="boxButton">Button</a>

    </div>

    <div class="boxContainer <?= $boxContainerColorArray[array_rand($boxContainerColorArray, 1)] ?>">

        <p class="boxType">Blog</p>
        <p class="boxTitle">Check out this amazing blog post</p>

        <a class="boxButton">Button</a>

    </div>

    <div class="boxContainer <?= $boxContainerColorArray[array_rand($boxContainerColorArray, 1)] ?>">

        <p class="boxType">Blog</p>
        <p class="boxTitle">Check out this amazing blog post</p>

        <a class="boxButton">Button</a>

    </div>

</div>