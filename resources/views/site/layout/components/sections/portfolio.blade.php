<div id="portfolio" class="section md-padding bg-grey">
    <div class="container">
        <div class="row">
            <div class="section-header text-center">
                <h2 class="title">Latest Books</h2>
            </div>
            @foreach($books as $book)
            <div class="col-md-4 col-xs-6 work">
                <img class="img-responsive" src="{{ asset($book['image']) }}" alt="">
                <div class="overlay"></div>
                <div class="work-content">
                    <span>{{ $book->category['name'] }}</span>
                    <h3>{{ $book['Author'] }}</h3>
                    <div class="work-link">
                        <a href="#"><i style="margin-top: 18px; display: inline-block;" class="fa fa-external-link"></i></a>
                        <a class="lightbox" href="{{ asset($book['image']) }}"><i style="margin-top: 18px; display: inline-block;" class="fa fa-search"></i></a>
                    </div>
                </div>
            </div>

            @endforeach

        </div>
    </div>
</div>