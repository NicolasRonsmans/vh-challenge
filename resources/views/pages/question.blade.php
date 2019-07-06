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
        <form action="/questions/{{ $question->id }}/answers" method="POST">
            <textarea name="answer" placeholder="Enter your answer here..."></textarea>
            <button type="submit">Answer</button>
        </form>
    </section>
@endsection
