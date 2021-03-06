<style>
@import url("https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600,700,800");
* {
  box-sizing: border-box;
}

body {
  /* background-color: #FFE53B; */
  /* background-image: linear-gradient(147deg, #FFE53B 0%, #fd3838 74%); */
  /* background-image: linear-gradient(to right, #4c4c4c 0%, #595959 12%, #666666 25%, #474747 39%, #2c2c2c 50%, #000000 51%, #111111 60%, #2b2b2b 76%, #1c1c1c 91%, #222222 100%); */
  min-height: 100vh;
  /* font-family: 'Fira Sans', sans-serif; */
  /* display: flex; */
}

.blog-slider {
  width: 95%;
  position: relative;
  max-width: 800px;
  margin: auto;
  background: #fff;
  box-shadow: 0px 14px 80px rgba(34, 35, 58, 0.2);
  padding: 25px;
  border-radius: 25px;
  height: 400px;
  transition: all .3s;
}
@media screen and (max-width: 992px) {
  .blog-slider {
    max-width: 680px;
    height: 400px;
  }
}
@media screen and (max-width: 768px) {
  .blog-slider {
    min-height: 500px;
    height: auto;
    margin: 50px auto;
  }
}
@media screen and (max-height: 500px) and (min-width: 992px) {
  .blog-slider {
    height: 350px;
  }
  .blog-slider__img {
    height: 270px;
  }
}
.blog-slider__item {
  display: flex;
  align-items: center;
}
@media screen and (max-width: 768px) {
  .blog-slider__item {
    flex-direction: column;
  }
}
.blog-slider__item.active .blog-slider__img img {
  opacity: 1;
  transition-delay: .3s;
}
.blog-slider__item.active .blog-slider__content > * {
  opacity: 1;
  transform: none;
}

.blog-slider__img {
  width: 200px;
  flex-shrink: 0;
  height: 200px;
  background-image: linear-gradient(147deg, #fe8a39 0%, #fd3838 74%);
  box-shadow: 4px 13px 30px 1px rgba(252, 56, 56, 0.2);
  border-radius: 20px;
  transform: translateX(-80px);
  overflow: hidden;
}
.blog-slider__img:after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-image: linear-gradient(147deg, #fe8a39 0%, #fd3838 74%);
  border-radius: 20px;
  opacity: 0.8;
}
.blog-slider__img img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  display: block;
  opacity: 0;
  border-radius: 20px;
  transition: all .3s;
}
@media screen and (max-width: 768px) {
  .blog-slider__img {
    transform: translateY(-50%);
    width: 90%;
  }
}
@media screen and (max-width: 576px) {
  .blog-slider__img {
    width: 95%;
  }
}

@media screen and (max-width: 768px) {
  .blog-slider__content {
    margin-top: -80px;
    text-align: center;
    padding: 0 30px;
  }
}
@media screen and (max-width: 576px) {
  .blog-slider__content {
    padding: 0;
  }
}
.blog-slider__content > * {
  opacity: 0;
  transform: translateY(25px);
  transition: all .4s;
}
.blog-slider__code {
  color: #7b7992;
  margin-bottom: 15px;
  display: block;
  font-weight: 500;
}
.blog-slider__title {
  font-size: 24px;
  font-weight: 700;
  color: #0d0925;
  margin-bottom: 20px;
}
.blog-slider__text {
  color: #4e4a67;
  margin-bottom: 30px;
  line-height: 1.5em;
}
.blog-slider__button {
  display: inline-flex;
  background-image: linear-gradient(147deg, #fe8a39 0%, #fd3838 74%);
  padding: 15px 35px;
  border-radius: 50px;
  color: #fff;
  box-shadow: 0px 14px 80px rgba(252, 56, 56, 0.4);
  text-decoration: none;
  font-weight: 500;
  justify-content: center;
  text-align: center;
  letter-spacing: 1px;
}
@media screen and (max-width: 576px) {
  .blog-slider__button {
    width: 100%;
  }
}

</style>

<div class="blog-slider">
        {{-- <div class="blog-slider__wrp"> --}}
         
        
        {{-- <div class="blog-slider__pagination"> --}}
           <div class="blog-slider__item active">
            <div class="blog-slider__img">
              @php
              $defImg = '<svg width="400" height="400"><rect width="400" height="400" style=""></rect><text x="200" y="200" fill="#fff" >'.$post->title.'</text>
                          Sorry, your browser does not support inline SVG.  
                        </svg>';
              $defImg =  "data:image/svg+xml;charset=UTF-8,".utf8_encode($defImg);
              if(!empty($post->featured_image))
              $defImg = $post->featured_image
              
              @endphp
              
              <img src="{{ $defImg}}" alt="">
            </div>
            <div class="blog-slider__content">
              <span class="blog-slider__code">{{ $post->published_at->format('M d, Y') }} — {{ $post->readTime }}</span>
              <div class="blog-slider__title">{{ $post->title }}</div>
              <div class="blog-slider__text">{{ $post->summary }}</div>
              <a href="{{ route('blog.post', $post->slug) }}" class="blog-slider__button">READ MORE</a>
            </div>
          </div>
        {{-- </div> --}}
       
        {{-- </div> --}}
      </div>