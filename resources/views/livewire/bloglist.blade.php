<div class="row">
    <div class="container">
        <div class="col-md-8 mx-auto">
            <div class="row mb-5">
                @if (count($Blogs) > 0)
                    @foreach ($Blogs as $blog)
                        <div class="col-md-3 mt-5">
                            <div class="card">
                                <a href="{{ url('blog/' . $blog->slug) }}">
                                    <img height="200" src="{{ $blog->feature_image_url }}"class="card-img-top"
                                        alt="{{ $blog->feature_image }}" /></a>
                                <div class="card-body">
                                    <h5 class="card-title"><a class="text-decoration-none  text-muted"
                                            href="{{ url('blog/' . $blog->slug) }}">{{ $blog->title }}</a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="alert alert-danger">No blog Found</p>
                @endif
            </div>
        </div>
    </div>
</div>
