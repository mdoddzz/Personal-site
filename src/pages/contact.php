<?

if($sbmt) { 
    
    mail("whomjd5@gmail.com", "NEW Website contect request!!", "Name: ".$contactName."<br>Email: ".$contactEmail."<br>Message: ".$contactMessage);

}

?>
<h1>Contact.</h1>
<h3>If for any reason you would like to contact me<br>I guess here is the best place to do so</h3>

<div class="employmentStatus">
    <strong>Employment Status: </strong> Happily employed @ Wilxite Ltd
</div>

<div class="containerSplit thirdContainer reverseContainer noOutsideMargin">

    <div class="container">

        <a><i class="fas fa-envelope"></i> contact@michaeldodd.co.uk</a><br>
        <a><i class="fab fa-twitter-square"></i> @mdoddzz</a><br>
        <a><i class="fab fa-linkedin"></i> linkedin.com/afdsfsd</a><br>
        <a><i class="fab fa-github"></i> github.com/wilxiteMike</a>

    </div>

    <div class="container twoThirds">

        <form class="formContainer" id="contactForm">

            <div class="animatedInput">
                <input type="text" name="contactName" />
                <label>Name</label>
                <span class="focus-border"></span>
            </div>

            <div class="animatedInput">
                <input type="text" name="contactEmail" />
                <label>Email</label>
                <span class="focus-border"></span>
            </div>

            <div class="animatedInput">
                <textarea name="contactMessage"></textarea>
                <label>Message</label>
                <span class="focus-border"></span>
            </div>

            <input type="hidden" name="sbmt" value="1" /> 

            <a class="button right medium positive submitContact">Submit</a>

        </form>

    </div>

</div>
<script>

$('.submitContact').click( function(){

    $('#contactForm').submit();

});

</script>