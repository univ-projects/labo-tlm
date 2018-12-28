@extends('layouts.front')
@extends('layouts.projetdetail')

<!--@section('title','Acceuil')    hadi ta3ach -->

@section('content')


<div class="page-head" style="    background-image:
            linear-gradient(to right bottom,
             rgba(105, 172, 199, 0.2),
             rgba(11, 125, 218, 0.8)),
            url({{asset('images/images/img/team.jpg')}});
            background-position: center;
            background-size:cover;">
      <div class="container">
        <h2 class="page-title">V´eriﬁcation de contrats logiciels</h2>
        <small>équipe Geni Logiciel</small>
      </div>
    </div>


  <main class="main-content">
    <div class="fullwidth-block">
      <div class="container">
        <a href="." class="button back"><img src="{{asset('images/images/icons/arrow-back.png')}}" alt="">Retour aux projets</a>
        <div class="row">
          <div class="col-md-6">
            <figure>
              <img src="public/images/projects/project3.jpg" alt="" style="width: 500px;height:350px;">
            </figure>
          </div>
          <div class="col-md-6">
            <h2 class="section-title">V´eriﬁcation de contrats logiciels `a l’aide detransformations de mod`eles Application `a Kmeliai</h2>
            <ul class="project-info">
              <li><strong>Date:</strong> 06/10/14</li>
              <li><strong>Client:</strong> Lorem ipsum</li>
              <li><strong>Manager:</strong> Howard Brown</li>
              <li><strong>Equipe:</Jessica Smith, Tom Fisher, Sarah Branson, Ted Marks</li>
              <li><strong>But:</strong> Neque porro quisquam est qui dolorem ipsum quia dolor sit amet</li>

            </ul>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non.</p>

            <p>incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum dolorem.</p>
          </div>
          <div class="col-md-6">
            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non.</p>

            <p>incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum dolorem.</p>
          </div>
        </div>
      </div>
    </div>



    <div class="fullwidth-block">
      <div class="container">

        <div class="row">

          <div class="col medium-10 small-12 large-10">
            <div class="team">
              <div class="w3-content w3-display-container">
<img class="mySlides" src="public/images/projects/project1.jpg" style="width:100%">
<img class="mySlides" src="public/images/projects/project2.jpg" style="width:100%">
<img class="mySlides" src="public/images/projects/project3.jpg" style="width:100%">


<button class="w3-button w3-black w3-display-left" onclick="plusDivs(-1)">&#10094;</button>
<button class="w3-button w3-black w3-display-right" onclick="plusDivs(1)">&#10095;</button>
</div>

<script>
var slideIndex = 1;
showDivs(slideIndex);

function plusDivs(n) {
showDivs(slideIndex += n);
}

function showDivs(n) {
var i;
var x = document.getElementsByClassName("mySlides");
if (n > x.length) {slideIndex = 1}
if (n < 1) {slideIndex = x.length}
for (i = 0; i < x.length; i++) {
 x[i].style.display = "none";
}
x[slideIndex-1].style.display = "block";
}
</script>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="fullwidth-block" data-bg-color="#edf2f4">
      <div class="container">

        <div class="row">

          <div class="col medium-10 small-12 large-10">
            <div class="team">
              <h2 style="text-align: center;">
                <span style="font-size: 130%;color: #542a44;" >Partenaire <br><br></span>
              </h2>
              <div id="team" name="team">
            <div class="container">
              <div class="row centered">

                <div class="col-md-4 centered"> <a href="partenaire.html" class="button back"><img class="img img-circle lt-box" src="https://www.lapyramideduloup.com/wp-content/uploads/2018/03/logo-auxerre.jpg" height="120px" width="120px" alt=""> </a>
                  <div class="rt-box"><h4><strong>AUXERRE</strong></h4>

              </div>
                 </div>


            </div>
            <!-- row -->
          </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>



  </main> <!-- .main-content -->

@endsection
