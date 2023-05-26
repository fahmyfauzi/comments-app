@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1>Articles</h1>
                @foreach (range(1, 10) as $item)
                    <a href="{{ route('articles.show', 'lorem-ipsum') }}" class="text-primary h5">Lorem ipsum dolor sit amet
                        consectetur adipisicing elit. Vel, a.</a>
                    <div>
                        <span>Fahmy Fauzi</span>
                        <span>26 Mei</span>
                        <span>(0) Comments</span>
                    </div>
                    <p class="text-secondary">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit iure explicabo similique sunt
                        quae harum consequatur voluptates amet laborum quisquam!
                    </p>
                @endforeach

            </div>
        </div>
    </div>
@endsection
