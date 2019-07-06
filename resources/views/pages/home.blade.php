@extends('../layout')

@section('title', $title)

@section('main')
    <section>
        <form action="/questions" method="POST">
            @csrf
            <textarea name="question" placeholder="Enter your question here..."></textarea>
            <button type="submit">Ask</button>
        </form>
    </section>
    <hr />
    <section>
        <h1>Questions list</h1>

        @foreach ($entries as $entry)
            <article>
                <h1>
                    <a href="/questions/{{ $entry['question']->id }}" title="{{ $entry['question']->body}}">
                        {{ $entry['question']->body }}
                        ({{ $entry['answers'] }} {{ $entry['answers'] < 2 ? 'answer' : 'answers' }})
                    </a>
                </h1>
            </article>
        @endforeach
    </section>
@endsection
