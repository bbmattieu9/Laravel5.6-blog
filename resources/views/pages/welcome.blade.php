@extends('main')

@section('title', ' | Homepage')

@section('content')

  <section style="background: url(img/hero.jpg); background-size: cover; background-position: center center" class="hero">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h1 class="h1">"Cogito ego sum" - As a man thinketh, so He is.<br>I am because I think; </h1><a href="#" class="hero-link">Discover more</a>
          </div>
        </div><a href=".intro" class="continue link-scroll"><i class="fa fa-long-arrow-down"></i> Scroll Down</a>
       </div>
    </section>

      <section class="latest-posts">
        <div class="container">
          <header>
            <h2>Latest from the blog</h2>
            <p class="text-big">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
          </header>
          <div class="row">
            @foreach($posts as $post)
              <div class="post col-md-4">
                @if(!is_null($post->image))
                  <div class="post-thumbnail"><a href="#"><img src="{{ asset('images/' . $post->image) }}" width="640" height="450" alt="article image" class="img-fluid"></a></div>
                @endif
                <div class="post-details">
                  <div class="post-meta d-flex justify-content-between">
                    <div class="date">{{date('M j Y ', strtotime($post->created_at))}}</div>
                    <div class="category"><a href="#">{{ $post->category->name }}</a></div>
                  </div><a href="{{ url('blog/'.$post->slug)}} ">
                    <h3 class="h4">{{ $post->title }}</h3></a>
                    <article class="text-justify">
                        <p class="text-muted">{{substr($post->body, 0, 300)}}{{ strlen($post->body) > 300 ? "..." : '' }}</p>
                    </article>
                </div>
              </div>
            @endforeach


          </div>
        </div>
      </section>
      {{-- End of lATEST News Section --}}

   <section style="background: url(img/divider-bg.jpg); background-size: cover; background-position: center bottom" class="divider">
   <div class="container">
     <div class="row">
       <div class="col-md-7">
         <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</h2><a href="#" class="hero-link">View More</a>
       </div>
     </div>
   </div>
   </section>

    <!-- Newsletter Section-->
    <section class="newsletter">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h2 class="">Subscribe to Newsletter</h2>
            <p class="text-big">Join our Up-to-date subscribers
              and get exclusive access to variesties of posts and news.</p>
          </div>
          <div class="col-md-8 mx-auto">
            <div class="form-holder">
              <form action="#">
                <div class="form-group">
                  <input type="email" name="email" id="email" placeholder="Type your email address">
                  <button type="submit" class="submit">Subscribe</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <footer class="main-footer">
          <div class="container">
            <div class="row">
              <div class="col-md-4">
                <div class="logo">
                  <h6 class="text-white">Cerutti.io</h6>
                </div>
                <div class="contact-details">
                  <p>5 Obansa Daudu Street,Iju, Lagos.</p>
                  <p>Phone: (070) 308 45 700</p>
                  <p>Email: <a href="mailto:cerruti@workplace.com">Info@cerutti.io</a></p>
                  <ul class="social-menu">
                    <li class="list-inline-item"><a href="#"><i class="fab fa-facebook fa-lg"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-twitter fa-lg"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-instagram fa-lg"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-behance fa-lg"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest fa-lg"></i></a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-4">
                <div class="menus d-flex">
                  <ul class="list-unstyled">
                    <li> <a href="#">My Account</a></li>
                    <li> <a href="#">Add Listing</a></li>
                    <li> <a href="#">Pricing</a></li>
                    <li> <a href="#">Privacy &amp; Policy</a></li>
                  </ul>
                  <ul class="list-unstyled">
                    <li> <a href="#">Our Partners</a></li>
                    <li> <a href="#">FAQ</a></li>
                    <li> <a href="#">How It Works</a></li>
                    <li> <a href="#">Contact</a></li>
                  </ul>
                </div>
              </div>

            </div>
          </div>
          <div class="copyrights">
            <div class="container">
              <div class="row">
                <div class="col-md-6">
                  <p>&copy; 2018. All rights reserved. Your great site.</p>
                </div>
                <div class="col-md-6 text-right">
                  <p>Crafts of <a href="#" class="text-white">Cerutti.io</a>
                  </p>
                </div>
              </div>
            </div>
          </div>

        </footer>

@endsection
