<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('front/style/bootstrap.rtl.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/style/style.css') }}" />
    <title>my own website</title>
  </head>
  <body>
 @include('front.nav')


   

    <section class="blogs-details py-5">
       

        <div class="container">
            <div class="row justify-content-center">
            
                <div class="col-lg-10">
                    <div class="blog-item shadow">
                        <img src="{{ asset('admin/images/blog'.$blog->image) }}" alt="" class="w-100">
                        <div class="blog-item-text p-2">
                            <h4 class="p-2 pb-4 fw-bold fs-5 border-bottom">{{ $blog->title }}</h4>
                             <p class="text-muted mt-5"> {{ $blog->description }}
                             </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@include('front.footer')

    <script src="/js/bootstrap.js"></script>
  </body>
</html>
