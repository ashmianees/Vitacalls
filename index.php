<?php
session_start();
if(!isset($_SESSION['uid']))
{
  header('location:home.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Vita Calls</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen">
<link rel="stylesheet" href="css/grid.css" type="text/css" media="screen">
<script src="js/jquery-1.6.3.min.js" type="text/javascript"></script>
<script src="js/tabs.js" type="text/javascript"></script>
<!--[if lt IE 9]>
<script type="text/javascript" src="js/html5.js"></script>
<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen">
<![endif]-->
</head>
<body id="page1">
<div class="bg">
  <!--==============================header=================================-->
  <header>
    <div class="menu-row">
      <div class="main">
        <nav>
          <ul class="menu wrapper">
            <li><a class="active" href="index.php">Home Page</a></li>
            <li><a href="nutrition.html">Nutrition</a></li>
            <li><a href="diets.html">Best Diets</a></li>
            <li><a href="programs.html">Programs</a></li>
            <li><a href="demo_profile.php">Account</a></li>
          </ul>
        </nav>
      </div>
    </div>
    <div class="main">
      <div class="wrapper p3">
        <h1><a href="index.html">Vita Calls</a></h1>
        <form id="search-form" action="#" method="post" enctype="multipart/form-data">
          <fieldset>
            <div class="search-field">
              <input name="search" type="text" value="Search" onBlur="if(this.value=='') this.value='Search'" onFocus="if(this.value =='Search' ) this.value=''" />
              <a class="search-button" href="#"></a> </div>
          </fieldset>
        </form>
      </div>
    </div>
    <ul class="tabs">
      <li><a href="#tab1">Best Diet Advices</a></li>
      <li><a href="#tab2">Exercise &amp; Physical Fitness</a></li>
      <li><a href="#tab3">Weight Loss Programs</a></li>
    </ul>
    <div class="tab_container">
      <div id="tab1" class="tab_content">
        <div class="main">
          <div class="wrapper">
            <figure class="img-indent-r"><img src="images/page1-img1.jpg" alt=""></figure>
            <div class="extra-wrap">
              <div class="indent"> <strong class="title">Best</strong>
                <p class="p5">Diet Advice You've<br>
                  Never Heard Before</p>
                <div class="btn-wrap"> <span class="button"> <a href="#"><strong>Read More</strong></a> </span> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="tab2" class="tab_content">
        <div class="main">
          <div class="wrapper">
            <figure class="img-indent-r"><img src="images/page1-img2.jpg" alt=""></figure>
            <div class="extra-wrap">
              <div class="indent"> <strong class="title">Exercise</strong>
                <p class="p5">And Physical<br>
                  Fitness</p>
                <div class="btn-wrap"> <span class="button"> <a href="#"><strong>Read More</strong></a> </span> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="tab3" class="tab_content">
        <div class="main">
          <div class="wrapper">
            <figure class="img-indent-r"><img src="images/page1-img3.jpg" alt=""></figure>
            <div class="extra-wrap">
              <div class="indent"> <strong class="title">Fastest</strong>
                <p class="p5">Weight Loss<br>
                  Programs</p>
                <div class="btn-wrap"> <span class="button"> <a href="#"><strong>Read More</strong></a> </span> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!--==============================content================================-->
  <section id="content">
    <div class="main">
      <div class="container_12">
        <div class="wrapper img-indent-bot">
          <article class="grid_4">
            <h3>Weight-Loss Basics</h3>
            <ul class="list-1">
              <li><a href="#">Count Calories</a></li>
              <li><a href="#">Weight Loss Basics</a></li>
              <li><a href="#">Healthy Eating</a></li>
              <li><a href="#">Eating Out</a></li>
              <li><a href="#">Nutrition</a></li>
              <li><a href="#">About Diets</a></li>
              <li><a href="#">Emotional Eating</a></li>
              <li><a href="#">Exercise for Weight Loss</a></li>
              <li><a href="#">Obesity &amp; Health</a></li>
            </ul>
          </article>
          <article class="grid_8">
            <h2>Welcome to Vita Calls!</h2>
            <div class="wrapper prev-indent-bot">
              <figure class="img-indent2"><img src="images/page1-img4.jpg" alt=""></figure>
              <div class="extra-wrap">
			 			  
               <h6 class="p1">Book a consultation with our experts for us to understand how Vita Calls can help you build the perfect roadmap to your health goals</h6>
                Receive a carefully designed plan that is personalized to your needs and assimilates easily into your daily life</h6>
                </div>
            </div>
            <p class="prev-indent-bot">Check-in with your personal coach to monitor your progress and address any questions or concerns.</p>
            <a class="button-2" href="#">Read More</a> </article>
        </div>
        <div class="wrapper">
          <article class="grid_4">
            <div class="indent-right">
              <h3>Recent Comments</h3>
              <h6>Admin</h6>
              <p class="p2">&quot;For free time when we are free
it is an option <br>
               to choose and nothing prevents from doing what is most important&quot;</p>
              <h6 class="p0">Guest 1</h6>
              <p class="p2">&quot;I just went through my annual check up and my cholesterol levels couldn’t be any better (both LDL and HDL). Diet, exercise, and above all, fiber intake did the trick for me. Thank you so much!”<br>
                &quot;</p>
              <h6 class="p0">Guest 2</h6>
              &quot;“I wish more Dieticians understood the complexity of people’s relationship to food like you all do! <br>
            My Dietitian was incredibly responsive and felt more like a food therapist than a Dietician, which is exactly what I needed....&quot; </div>
          </article>
          <article class="grid_4">
            <h3 class="prev-indent-bot">We Recommend</h3>
            <h6 class="p0">Weight Loss Diet</h6>
            <p class="p0">Transformation plans that are fully customized to your preferences and needs</p>
            <p class="p2"><a class="link" href="#">Read More</a></p>
            <h6 class="p0">Help Me Lose Weight Fast</h6>
            <p class="p0">If you’re looking for a workout plan that can help you lose weight, adding more sweat sessions to your weekly routine is a great place to start.</p>
            <p class="p2"><a class="link" href="#">Read More</a></p>
            <h6 class="p0">Losing Weight Fast</h6>
            <p class="p0">Check out the perfectly planned week of workouts tailored to weight-loss goals below (and save the pin at the bottom for easy reference, too).</p>
            <a class="link" href="#">Read More</a> </article>
          <article class="grid_4">
            <div class="indent-left">
              <h3 class="prev-indent-bot">Popular Topics</h3>
              <div class="wrapper p2">
                <figure class="img-indent2"><img src="images/page1-img5.jpg" alt=""></figure>
                <div class="extra-wrap">
                  <h6 class="p0">Light And Nutrition</h6>
                  Exposure to natural light, especially morning light, is important to managing our circadian rhythm.<a class="link" href="#">Read More</a> </div>
              </div>
              <div class="wrapper p2">
                <figure class="img-indent2"><img src="images/page1-img6.jpg" alt=""></figure>
                <div class="extra-wrap">
                  <h6 class="p0">Family</h6>
                  Your omicron home self-management survival list . <a class="link" href="#">Read More</a> </div>
              </div>
              <div class="wrapper">
                <figure class="img-indent2"><img src="images/page1-img7.jpg" alt=""></figure>
                <div class="extra-wrap">
                  <h6 class="p0">Apple cider Vinger</h6>
                  Is drinking this popular home. <a class="link" href="#">Read More</a> </div>
              </div>
            </div>
          </article>
        </div>
      </div>
    </div>
  </section>
</div>
<!--==============================footer=================================-->
<footer>
  <div class="main">
    <div class="aligncenter"> <span>Copyright &copy; <a href="#">Ashmi Anees</a> All Rights Reserved</span> </div>
  </div>
</footer>
</body>
</html>