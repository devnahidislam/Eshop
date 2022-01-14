
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('/assets/images/img1.jpg') }}" alt="Product Image"
        class="d-block w-100 slider-img">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('/assets/images/img2.jpg') }}" alt="Product Image"
        class="d-block w-100 slider-img">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('/assets/images/img4.jpg') }}" alt="Product Image"
        class="d-block w-100 slider-img">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

<!-- Carousel -->
<div id="demo" class="carousel slide" data-bs-ride="carousel">

    <!-- Indicators/dots -->
    {{-- <div class="carousel-indicators">
        @foreach ($featured_products as $product)
            <button type="button" data-bs-target="#demo" data-bs-slide-to="{{ $product['id'] }}"
                class="active"></button>
        @endforeach
    </div> --}}

    <!-- The slideshow/carousel -->
    {{-- <div class="carousel-inner">
        @foreach ($featured_products as $product)
            <div class="carousel-item {{ $product['id'] == 1 ? 'active' : '' }}">
                <a href="#">
                    <img src="{{ asset('/assets/uploads/products/' . $product->image) }}" alt="Product Image"
                        class="d-block w-100 slider-img">
                    <div class="carousel-caption slider-text">
                        <h3>{{ $product->name }}</h3>
                        <p>{{ $product->description }}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div> --}}

    <!-- Left and right controls/icons -->
    {{-- <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button> --}}

</div>
