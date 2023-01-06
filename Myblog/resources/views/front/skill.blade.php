<section class="skill py-5">
    <div class="skill-title text-center py-5">
      <h2 class="fw-bolder">my skills</h2>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut,
        laboriosam.
      </p>
    </div>

    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="skill-text">
            <h3 class="fs-5 fw-bold pb-3">{{ $about->title }}</h3>
            <p class="text-muted">
              {{ $about->description }}
            </p>
            <a href="{{ route('skill.index') }}" class="btn btn-danger px-4">{{ $about->link }}</a>
          </div>
        </div>
        <div class="col-lg-6">
         @foreach($skill as $item)
          
              <div class="progress mt-3">


                
                  <div class="progress-bar  fs-6"   role="progressbar" style="width: {{ $item->precentage }}%"  aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">
                       {{$item->title}} {{ $item->precentage }}%
                  </div>
          
         
          
               </div>
        @endforeach
      </div>
    </div>
  </section>