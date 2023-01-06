<section class="blogs py-5">
    <div class="blog-title text-center mt-5">
        <h2 class="fw-bold">my blogs</h2>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Rem, animi itaque? Earum, atque perferendis. Dicta minus debitis aut voluptate aperiam?</p>
    </div>

    <div class="container">
        <div class="row">
          @foreach($blog as $item)
            
          <div class="col-lg-4">
            <div class="blog-item shadow">
                <img src="{{ asset('admin/images/blog/'.$item->image) }}" alt="" class="w-100">
                <div class="blog-item-text p-2">
                    <h4 class="p-2 fw-bold fs-5 border-bottom">{{ $item->title }}</h4>
                     <p class="text-muted">{{ $item->description }}</p>
                      <a href="{{ route('single' , $item->id) }}" target="blank" class="btn btn-danger w-100">read plz</a>
                </div>
            </div>
        </div>
            
          @endforeach
         
        </div>
    </div>
</section>