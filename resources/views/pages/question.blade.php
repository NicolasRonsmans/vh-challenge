@extends('../layout')

@section('title', $title)

@section('main')
    <article class="list-group">
        <h1 class="h2 list-group-item bg-info text-white">{{ $question->body }}</h1>
        @foreach ($question->answers as $answer)
            <div class="list-group-item">
                <p class="mb-0">{{ $answer->body }}</p>
            </div>
        @endforeach
    </article>
    <hr />
    <section>
        <form action="/questions/{{ $question->id }}/answers" method="POST" id="form-answer">
            @csrf
            <div class="form-group">
                <textarea name="body" class="form-control @error('body') is-invalid @enderror" placeholder="Enter your answer here...">{{ old('body') }}</textarea>
                @error('body')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-info">Answer</button>
            </div>
        </form>
    </section>
@endsection
