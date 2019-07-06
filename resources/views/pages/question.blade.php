@extends('../layout')

@section('title', $title)

@section('main')
    <article>
        <h1>{{ $question->body }}</h1>

        @foreach ($question->answers as $answer)
            <div>
                <p>
                    {{ $answer->body }}
                </p>
            </div>
        @endforeach
    </article>
    <section>
        <form action="/questions/{{ $question->id }}/answers" method="POST" id="form-answer">
            @csrf
            <textarea name="body" placeholder="Enter your answer here..."></textarea>
            @error('body')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <button type="submit">Answer</button>
        </form>
    </section>
@endsection
