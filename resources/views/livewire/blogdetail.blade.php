<div class="row">
    <div class="container">
        <div class="col-md-8 mx-auto">
            <div class="row mt-5">
                <div class="col-md-6 mx-auto">
                    <div class="card mb-3">
                        <img height="200" src="{{ $blog->feature_image_url }}" class="card-img-top"
                            alt="{{ $blog->feature_image }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $blog->title }}</h5>
                            <p class="card-text"> {{ $blog->description }}.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
